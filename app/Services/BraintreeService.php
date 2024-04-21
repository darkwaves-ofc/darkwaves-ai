<?php

namespace App\Services;

use Illuminate\Http\Request;
use Spatie\Backup\Listeners\Listener;
use App\Services\Statistics\UserService;
use App\Events\PaymentReferrerBonus;
use App\Events\PaymentProcessed;
use App\Models\Payment;
use App\Models\PrepaidPlan;
use App\Models\User;

class BraintreeService 
{

    protected $gateway;
    protected $promocode;
    private $api;


    public function __construct()
    {
        $this->api = new UserService();

        $verify = $this->api->verify_license();

        if($verify['status']!=true){
            return false;
        }

        try {
            $this->gateway = new \Braintree\Gateway([
                'environment' => config('services.braintree.env'),
                'merchantId' => config('services.braintree.merchant_id'),
                'publicKey' => config('services.braintree.public_key'),
                'privateKey' => config('services.braintree.private_key')
            ]);
        } catch (\Exception $e) {
            toastr()->error(__('Braintree authentication error, verify your braintree settings first'));
            return redirect()->back();
        }
       
    }


    public function handlePaymentPrePaid(Request $request, PrepaidPlan $id)
    {   
        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;

        try {

            $clientToken = $this->gateway->clientToken()->generate();
            
            session()->put('plan_id', $id);
            session()->put('total_amount', $total_value);

        } catch (\Exception $e) {
            toastr()->error(__('Braintree authentication error, verify your braintree settings first'));
            return redirect()->back();
        }

        return view('user.plans.braintree-checkout', compact('id', 'clientToken'));

    }


    public function handleApproval(Request $request)
    {        
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $total_amount = session()->get('total_amount');

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;

        try {
            $result = $this->gateway->transaction()->sale([
                'amount' => $total_amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
        } catch (\Exception $e) {
            toastr()->error(__('Braintree transaction error, verify your braintree settings first'));
            return redirect()->back();
        }        
        
        $plan = session()->get('plan_id');

        if ($result->success) {

            if (config('payment.referral.payment.enabled') == 'on') {
                if (config('payment.referral.payment.policy') == 'first') {
                    if (Payment::where('user_id', auth()->user()->id)->where('status', 'Success')->exists()) {
                        /** User already has at least 1 payment */
                    } else {
                        event(new PaymentReferrerBonus(auth()->user(), $result->transaction->id, $result->transaction->amount, 'Braintree'));
                    }
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $result->transaction->id, $result->transaction->amount, 'Braintree'));
                }
            }

            $record_payment = new Payment();
            $record_payment->user_id = auth()->user()->id;
            $record_payment->order_id = $result->transaction->id;
            $record_payment->plan_id = $plan->id;
            $record_payment->plan_name = $plan->plan_name;
            $record_payment->frequency = 'prepaid';
            $record_payment->price = $result->transaction->amount;
            $record_payment->currency = $result->transaction->currencyIsoCode;
            $record_payment->gateway = 'Braintree';
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

            $data['result'] = $result;
            $data['plan'] = $plan->id;
            $data['order_id'] = $result->transaction->id;

            return response()->json($data);

        } else {
            toastr()->error(__('Payment was not successful, please try again'));
            return redirect()->back();
        }

                
    }

}