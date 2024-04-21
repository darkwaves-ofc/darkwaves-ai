<?php

namespace App\Services;

use App\Traits\ConsumesExternalServiceTrait;
use Illuminate\Http\Request;
use Spatie\Backup\Listeners\Listener;
use Illuminate\Support\Str;
use App\Services\Statistics\UserService;
use App\Events\PaymentReferrerBonus;
use App\Events\PaymentProcessed;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\PrepaidPlan;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Carbon\Carbon;

class StripeService 
{
    use ConsumesExternalServiceTrait;

    protected $baseURI;
    protected $key;
    protected $secret;
    protected $promocode;
    private $api;

    /**
     * Stripe payment processing, unless you are familiar with 
     * Stripe's REST API, we recommend not to modify core payment processing functionalities here.
     * Part that are writing data to the database can be edited as you prefer.
     */
    public function __construct()
    {
        $this->api = new UserService();

        $verify = $this->api->verify_license();

        if($verify['status']!=true){
            return false;
        }

        $this->baseURI = config('services.stripe.base_uri');
        $this->key = config('services.stripe.api_key');
        $this->secret = config('services.stripe.api_secret');
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
        
        return "Bearer {$this->secret}"; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handlePaymentSubscription(Request $request, SubscriptionPlan $id)
    {
        if (!$id->stripe_gateway_plan_id) {
            toastr()->error(__('Stripe plan id is not set. Please contact the support team.'));
            return redirect()->back();
        }        

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;

        try {

            $customer = $this->createCustomer($request->user()->name, $request->user()->email, $request->payment_method);
            $subscription = $this->createSubscription($customer->id, $request->payment_method, $id);
            
        } catch (\Exception $e) {
            toastr()->error(__('Stripe authentication error, verify your stripe settings first'));
            return redirect()->back();
        }        

        if ($subscription->status == 'active') {
            session()->put('subscriptionID', $subscription->id);

            return redirect()->route('user.payments.subscription.approved', ['plan_id' => $id->id, 'subscription_id' => $subscription->id] );
        }
        
        $paymentIntent = $subscription->latest_invoice->payment_intent;


        if ($paymentIntent->status === 'requires_action') {
            $clientSecret = $paymentIntent->client_secret;

            session()->put('subscriptionID', $subscription->id);

            return view('user.plans.3d-secure-subscription')->with([
                'clientSecret' => $clientSecret,
                'plan_id' => $id->id,
                'paymentMethod' => $request->payment_method,
                'subscription_id' => $subscription->id
            ]);
        }

        toastr()->error(__('There was an error while activating your subscription. Please try again'));
        return redirect()->route('user.plans');
    }


    public function handlePaymentPrePaid(Request $request, PrepaidPlan $id)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;

        try {
            $intent = $this->createIntent($total_value, $request->currency, $request->payment_method);
        } catch (\Exception $e) {
            toastr()->error(__('Stripe authentication error, verify your stripe settings first'));
            return redirect()->back();
        }        

        session()->put('paymentIntentID', $intent->id);
        session()->put('plan_id', $id);

        return redirect()->route('user.payments.approved');
    }


    public function handleApproval()
    {
        if (session()->has('paymentIntentID')) {
            $paymentIntentID = session()->get('paymentIntentID');
            $plan = session()->get('plan_id');

            try {
                $confirmation = $this->confirmPayment($paymentIntentID);
            } catch (\Exception $e) {
                toastr()->error(__('Stipe payment confirmation error. Verify your stripe merchant account settings'));
                return redirect()->back();
            }
            

            if ($confirmation->status === 'requires_action') {
                $clientSecret = $confirmation->client_secret;

                return view('user.plans.3d-secure')->with([
                    'clientSecret' => $clientSecret
                ]);
            }

            if ($confirmation->status === 'succeeded') {
                $currency = strtoupper($confirmation->currency);
                $amount = $confirmation->amount / $this->resolveFactor($currency);
            }

            if (config('payment.referral.payment.enabled') == 'on') {
                if (config('payment.referral.payment.policy') == 'first') {
                    if (Payment::where('user_id', auth()->user()->id)->where('status', 'Success')->exists()) {
                        /** User already has at least 1 payment */
                    } else {
                        event(new PaymentReferrerBonus(auth()->user(), $paymentIntentID, $amount, 'Stripe'));
                    }
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $paymentIntentID, $amount, 'Stripe'));
                }
            }

            $record_payment = new Payment();
            $record_payment->user_id = auth()->user()->id;
            $record_payment->order_id = $paymentIntentID;
            $record_payment->plan_id = $plan->id;
            $record_payment->plan_name = $plan->plan_name;
            $record_payment->price = $amount;
            $record_payment->currency = $currency;
            $record_payment->gateway = 'Stripe';
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
            $order_id = $paymentIntentID;

            return view('user.plans.success', compact('plan', 'order_id'));
        }

        toastr()->error(__('Payment was not successful, please try again'));
        return redirect()->back();
    }


    public function createIntent($value, $currency, $paymentMethod)
    {
        return $this->makeRequest(
            'POST',
            '/v1/payment_intents',
            [],
            [
                'amount' => round($value * $this->resolveFactor($currency)),
                'currency' => strtolower($currency),
                'payment_method' => $paymentMethod,
                'confirmation_method' => 'manual',
            ],
        );
    }


    public function confirmPayment($paymentIntentID)
    {
        return $this->makeRequest(
            'POST',
            "/v1/payment_intents/{$paymentIntentID}/confirm",
        );
    }


    public function createCustomer($name, $email, $paymentMethod)
    {
        return $this->makeRequest(
            'POST',
            '/v1/customers',
            [],
            [
                'name' => $name,
                'email' => $email,
                'payment_method' => $paymentMethod,
            ],
        );
    }


    public function createSubscription($customerID, $paymentMethod, SubscriptionPlan $id)
    {
        return $this->makeRequest(
            'POST',
            '/v1/subscriptions',
            [],
            [
                'customer' => $customerID,
                'items' => [
                    ['price' => $id->stripe_gateway_plan_id],
                ],
                'default_payment_method' => $paymentMethod,
                'expand' => ['latest_invoice.payment_intent'],
            ],
        );
    }


    public function stopSubscription($subscriptionID)
    {
        return $this->makeRequest(
            'POST',
            '/v1/subscriptions/'. $subscriptionID,
            [],
            [
                'cancel_at_period_end' => 'true',
            ],
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


    public function resolveFactor($currency)
    {
        $zeroDecimanCurrency = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimanCurrency)) {
            return 1;
        }

        return 100;
    }
}