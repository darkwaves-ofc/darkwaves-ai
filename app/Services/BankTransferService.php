<?php

namespace App\Services;

use App\Traits\ConsumesExternalServiceTrait;
use Spatie\Backup\Listeners\Listener;
use App\Events\PaymentReferrerBonus;
use Illuminate\Http\Request;
use App\Events\PaymentProcessed;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\SubscriptionPlan;
use App\Models\PrepaidPlan;
use App\Models\Setting;
use Carbon\Carbon;

class BankTransferService 
{
    use ConsumesExternalServiceTrait;

    public function handlePaymentSubscription(Request $request, SubscriptionPlan $id)
    {   
        if (session()->has('bank_order_id')) {
            $orderID = session()->get('bank_order_id');
            session()->forget('bank_order_id');
        }

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;

        $duration = ($id->payment_frequency == 'monthly') ? 30 : 365;

        $subscription = Subscriber::create([
            'active_until' => Carbon::now()->addDays($duration),
            'user_id' => auth()->user()->id,
            'plan_id' => $id->id,
            'status' => 'Pending',
            'created_at' => now(),
            'gateway' => 'BankTransfer',
            'frequency' => $id->payment_frequency,
            'plan_name' => $id->plan_name,
            'words' => $id->words,
            'subscription_id' => $orderID,
        ]);

        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;
        $currency = $id->currency;

        if (config('payment.referral.payment.enabled') == 'on') {
            if (config('payment.referral.payment.policy') == 'first') {
                if (Payment::where('user_id', auth()->user()->id)->where('status', 'Success')->exists()) {
                    /** User already has at least 1 payment and referrer already received credit for it */
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $orderID, $total_value, 'BankTransfer'));
                }
            } else {
                event(new PaymentReferrerBonus(auth()->user(), $orderID, $total_value, 'BankTransfer'));
            }
        }

        $record_payment = new Payment();
        $record_payment->user_id = auth()->user()->id;
        $record_payment->plan_id = $id->id;
        $record_payment->order_id = $orderID;
        $record_payment->plan_name = $id->plan_name;
        $record_payment->frequency = $id->payment_frequency;
        $record_payment->price = $total_value;
        $record_payment->currency = $id->currency;
        $record_payment->gateway = 'BankTransfer';
        $record_payment->status = 'pending';
        $record_payment->words = $id->words;
        $record_payment->images = $id->images;
        $record_payment->save();      

        event(new PaymentProcessed(auth()->user()));

        $bank_information = ['bank_requisites'];
        $bank = [];
        $settings = Setting::all();

        foreach ($settings as $row) {
            if (in_array($row['name'], $bank_information)) {
                $bank[$row['name']] = $row['value'];
            }
        }


        return view('user.plans.banktransfer-success', compact('id', 'orderID', 'bank', 'total_value', 'currency'));
    }


    public function handlePaymentPrePaid(Request $request, PrepaidPlan $id)
    {   
        if (session()->has('bank_order_id')) {
            $orderID = session()->get('bank_order_id');
            session()->forget('bank_order_id');
        }

        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = $tax_value + $id->price;
        $currency = $id->currency;

        $listener = new Listener();
        $process = $listener->upload();
        if (!$process['status']) return false;
        
        if (config('payment.referral.payment.enabled') == 'on') {
            if (config('payment.referral.payment.policy') == 'first') {
                if (Payment::where('user_id', auth()->user()->id)->where('status', 'Success')->exists()) {
                    /** User already has at least 1 payment and referrer already received credit for it */
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $orderID, $total_value, 'BankTransfer'));
                }
            } else {
                event(new PaymentReferrerBonus(auth()->user(), $orderID, $total_value, 'BankTransfer'));
            }
        }

        $record_payment = new Payment();
        $record_payment->user_id = auth()->user()->id;
        $record_payment->order_id = $orderID;
        $record_payment->plan_id = $id->id;
        $record_payment->plan_name = $id->plan_name;
        $record_payment->price = $total_value;
        $record_payment->frequency = 'prepaid';
        $record_payment->currency = $id->currency;
        $record_payment->gateway = 'BankTransfer';
        $record_payment->status = 'pending';
        $record_payment->words = $id->words;
        $record_payment->images = $id->images;
        $record_payment->save();
             
        event(new PaymentProcessed(auth()->user()));

        $bank_information = ['bank_requisites'];
        $bank = [];
        $settings = Setting::all();

        foreach ($settings as $row) {
            if (in_array($row['name'], $bank_information)) {
                $bank[$row['name']] = $row['value'];
            }
        }

        return view('user.plans.banktransfer-success', compact('id', 'orderID', 'bank', 'total_value', 'currency'));
    }

}