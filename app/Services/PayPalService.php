<?php

namespace App\Services;

use App\Traits\ConsumesExternalServiceTrait;
use App\Events\PaymentReferrerBonus;
use Spatie\Backup\Listeners\Listener;
use Illuminate\Http\Request;
use App\Services\Statistics\UserService;
use App\Events\PaymentProcessed;
use App\Models\Payment;
use App\Models\PrepaidPlan;
use App\Models\SubscriptionPlan;
use App\Models\User;

class PayPalService 
{
    use ConsumesExternalServiceTrait;

    protected $baseURI;
    protected $clientID;
    protected $clientSecret;
    private $api;

    /**
     * Paypal payment processing, unless you are familiar with 
     * Paypal's REST API, we recommend not to modify core payment processing functionalities here.
     * Part that are writing data to the database can be edited as you prefer.
     */
    public function __construct()
    {
        $this->api = new UserService();

        $verify = $this->api->verify_license();

        if($verify['status']!=true){
            return false;
        }

        $this->baseURI = config('services.paypal.base_uri');
        $this->clientID = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
    }


    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }


    public function decodeResponse($response)
    {
        return json_decode($response);
    }


    public function resolveAccessToken()
    {
        
        $credentials = base64_encode("{$this->clientID}:{$this->clientSecret}");

        return "Basic {$credentials}";
    }


    public function handlePaymentSubscription(Request $request, SubscriptionPlan $id)
    {   
        if (!$id->paypal_gateway_plan_id) {
            toastr()->error(__('Paypal plan id is not set. Please contact the support team'));
            return redirect()->back();
        }

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;
        
        try {
            $subscription = $this->createSubscription($id, $request->user()->name, $request->user()->email);
        } catch (\Exception $e) {
            toastr()->error(__('Paypal authentication error, verify your paypal settings first'));
            return redirect()->back();
        }        

        $subscriptionLinks = collect($subscription->links);

        $approve = $subscriptionLinks->where('rel', 'approve')->first();

        session()->put('subscriptionID', $subscription->id);

        return redirect($approve->href);
    }


    public function handlePaymentPrePaid(Request $request, PrepaidPlan $id)
    {   
        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;

        try {
            $order = $this->createOrder($total_value, $request->currency);
        } catch (\Exception $e) {
            toastr()->error(__('Paypal authentication error, verify your paypal settings first'));
            return redirect()->back();
        }
        

        $orderLinks = collect($order->links);

        $approve = $orderLinks->where('rel', 'approve')->first();

        session()->put('approvalID', $order->id);
        session()->put('plan_id', $id);

        return redirect($approve->href);
    }


    public function handleApproval()
    {
        if (session()->has('approvalID')) {
            $approvalID = session()->get('approvalID');
            $plan = session()->get('plan_id');        
           
            try {
                $payment = $this->capturePayment($approvalID);
            } catch (\Exception $e) {
                toastr()->error(__('Paypal payment capture error. Verify your paypal merchant account settings'));
                return redirect()->back();
            }
            

            $name = $payment->payer->name->given_name;
            $payment = $payment->purchase_units[0]->payments->captures[0]->amount;
            $amount = $payment->value;
            $currency = $payment->currency_code;

            if (config('payment.referral.payment.enabled') == 'on') {
                if (config('payment.referral.payment.policy') == 'first') {
                    if (Payment::where('user_id', auth()->user()->id)->where('status', 'Success')->exists()) {
                        /** User already has at least 1 payment and referrer already received credit for it */
                    } else {
                        event(new PaymentReferrerBonus(auth()->user(), $approvalID, $amount, 'PayPal'));
                    }
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $approvalID, $amount, 'PayPal'));
                }
            }

            $record_payment = new Payment();
            $record_payment->user_id = auth()->user()->id;
            $record_payment->order_id = $approvalID;
            $record_payment->plan_id = $plan->id;
            $record_payment->plan_name = $plan->plan_name;
            $record_payment->price = $amount;
            $record_payment->currency = $currency;
            $record_payment->gateway = 'PayPal';
            $record_payment->frequency = 'prepaid';
            $record_payment->status = 'completed';
            $record_payment->words = $plan->words;
            $record_payment->images = $plan->images;
            $record_payment->save();
            
           //$group = (auth()->user()->hasRole('admin'))? 'admin' : 'subscriber';

            $user = User::where('id',auth()->user()->id)->first();
            //$user->syncRoles($group);    
            //$user->group = $group;
            //$user->plan_id = $plan->id;
            $user->available_words_prepaid = $user->available_words_prepaid + $plan->words;
            $user->available_images_prepaid = $user->available_images_prepaid + $plan->images;
            $user->save();       

            event(new PaymentProcessed(auth()->user()));
            $order_id = $approvalID;

            return view('user.plans.success', compact('plan', 'order_id'));
        }

        toastr()->error(__('Payment was not successful, please try again'));
        return redirect()->back();
    }


    public function createOrder($value, $currency)
    {
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => strtoupper($currency),
                            'value' => round($value * $factor = $this->resolveFactor($currency)) / $factor,
                        ]
                    ]   
                ],   
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => route('user.payments.approved'),
                    'cancel_url' => route('user.payments.cancelled'),
                ]
            ],            
            [],
            $isJSONRequest = true,
        );
    }


    public function capturePayment($approvalID)
    {
        return $this->makeRequest(
            'POST',
            "/v2/checkout/orders/{$approvalID}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json'
            ]
        );
    }    


    public function resolveFactor($currency)
    {
        $zeroDecimanCurrency = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimanCurrency)) {
            return 1;
        }

        return 100;
    }


    public function createSubscription(SubscriptionPlan $id, $name, $email)
    {
        return $this->makeRequest(
            'POST',
            '/v1/billing/subscriptions',
            [],
            [   
                'plan_id' => $id->paypal_gateway_plan_id,
                'subscriber' => [
                    'name' => [
                        'given_name' => $name,
                    ],
                    'email_address' => $email,
                ],   
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'SUBSCRIBE_NOW',
                    'return_url' => route('user.payments.subscription.approved', ['plan_id' => $id->id]),
                    'cancel_url' => route('user.payments.subscription.cancelled'),
                ]
            ],            
            [],
            $isJSONRequest = true,
        );
    }


    public function stopSubscription($subscriptionID)
    {
        return $this->makeRequest(
            'POST',
            '/v1/billing/subscriptions/' . $subscriptionID . '/cancel',
            [],
            [   
                'reason' => 'Just want to unsubscribe'
            ],            
            [],
            $isJSONRequest = true,
        );
    }


    public function validateSubscriptions(Request $request)
    {
        if (session()->has('subscriptionID')) {
            $subscriptionID = session()->get('subscriptionID');

            session()->forget('subscriptionID');

            return $request->subscription_id == $subscriptionID;
        }

        return false;
    }

}