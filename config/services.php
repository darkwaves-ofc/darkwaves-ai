<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Vendor
    |--------------------------------------------------------------------------
    */

    'openai' => [
        'key' => env('OPENAI_SECRET_KEY'),
    ],


    /*
    |--------------------------------------------------------------------------
    | Social Media Vendors for OAuth Login
    |--------------------------------------------------------------------------
    */

    'twitter' => [
        'enable' => env('CONFIG_ENABLE_LOGIN_TWITTER'),
        'client_id' => env('TWITTER_API_KEY'),
        'client_secret' => env('TWITTER_API_SECRET'),
        'redirect' => env('TWITTER_REDIRECT'),
    ],

    'linkedin' => [
        'enable' => env('CONFIG_ENABLE_LOGIN_LINKEDIN'),
        'client_id' => env('LINKEDIN_API_KEY'),
        'client_secret' => env('LINKEDIN_API_SECRET'),
        'redirect' => env('LINKEDIN_REDIRECT'),
    ],

    'google' => [
        'enable' => env('CONFIG_ENABLE_LOGIN_GOOGLE'),
        'client_id' => env('GOOGLE_API_KEY'),
        'client_secret' => env('GOOGLE_API_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
        /* Google reCaptcha Keys */
        'recaptcha' => [
            'enable' => env('GOOGLE_RECAPTCHA_ENABLE'),
            'site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
            'secret_key' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
        ],  
        /* Google Maps API Key */
        'maps' => [
            'enable' => env('GOOGLE_MAPS_ENABLE'),
            'key' => env('GOOGLE_MAPS_KEY'),   
        ],   
        /* Google Analytics Tracking ID */
        'analytics' => [
            'enable' => env('GOOGLE_ANALYTICS_ENABLE'),
            'id' => env('GOOGLE_ANALYTICS_ID'),   
        ],
    ],

    'facebook' => [
        'enable' => env('CONFIG_ENABLE_LOGIN_FACEBOOK'),
        'client_id' => env('FACEBOOK_API_KEY'),
        'client_secret' => env('FACEBOOK_API_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Gateways
    |--------------------------------------------------------------------------
    */

    'stripe' => [
        'enable' => env('STRIPE_ENABLED'),
        'subscription' => env('STRIPE_SUBSCRIPTION_ENABLED'),
        'base_uri' => env('STRIPE_BASE_URI'),
        'webhook_uri' => env('STRIPE_WEBHOOK_URI'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
        'api_key' => env('STRIPE_KEY'),
        'api_secret' => env('STRIPE_SECRET'),
        'class' => App\Services\StripeService::class,
    ],

    'paypal' => [
        'enable' => env('PAYPAL_ENABLED'),
        'subscription' => env('PAYPAL_SUBSCRIPTION_ENABLED'),
        'base_uri' => env('PAYPAL_BASE_URI'),
        'webhook_uri' => env('PAYPAL_WEBHOOK_URI'),
        'webhook_id' => env('PAYPAL_WEBHOOK_ID'),
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'class' => App\Services\PayPalService::class,
    ],

    'paystack' => [
        'enable' => env('PAYSTACK_ENABLED'),
        'subscription' => env('PAYSTACK_SUBSCRIPTION_ENABLED'),
        'base_uri' => env('PAYSTACK_BASE_URI'),
        'webhook_uri' => env('PAYSTACK_WEBHOOK_URI'),
        'api_key' => env('PAYSTACK_PUBLIC_KEY'),
        'api_secret' => env('PAYSTACK_SECRET_KEY'),
        'class' => App\Services\PaystackService::class,
    ],

    'razorpay' => [
        'enable' => env('RAZORPAY_ENABLED'),
        'subscription' => env('RAZORPAY_SUBSCRIPTION_ENABLED'),
        'base_uri' => env('RAZORPAY_BASE_URI'),
        'webhook_uri' => env('RAZORPAY_WEBHOOK_URI'),
        'webhook_secret' => env('RAZORPAY_WEBHOOK_SECRET'),
        'key_id' => env('RAZORPAY_KEY_ID'),
        'key_secret' => env('RAZORPAY_KEY_SECRET'),
        'class' => App\Services\RazorpayService::class,
    ],

    'mollie' => [
        'enable' => env('MOLLIE_ENABLED'),
        'subscription' => env('MOLLIE_SUBSCRIPTION_ENABLED'),
        'key_id' => env('MOLLIE_KEY_ID'),
        'base_uri' => env('MOLLIE_BASE_URI'),
        'webhook_uri' => env('MOLLIE_WEBHOOK_URI'),
        'class' => App\Services\MollieService::class,
    ],

    'braintree' => [
        'enable' => env('BRAINTREE_ENABLED'),
        'env' => env('BRAINTREE_ENV'),
        'merchant_id' => env('BRAINTREE_MERCHANT_ID'),
        'private_key' => env('BRAINTREE_PRIVATE_KEY'),
        'public_key' => env('BRAINTREE_PUBLIC_KEY'),
        'class' => App\Services\BraintreeService::class,
    ],

    'coinbase' => [
        'enable' => env('COINBASE_ENABLED'),
        'webhook_uri' => env('COINBASE_WEBHOOK_URI'),
        'webhook_secret' => env('COINBASE_WEBHOOK_SECRET'),
        'api_key' => env('COINBASE_API_KEY'),
        'class' => App\Services\CoinbaseService::class,
    ],

    'banktransfer' => [
        'enable' => env('BANK_TRANSFER_ENABLED'),
        'subscription' => env('BANK_TRANSFER_SUBSCRIPTION'),
        'class' => App\Services\BankTransferService::class,
    ],

];
