<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General Settings
    |--------------------------------------------------------------------------
    */

    'registration' => env('GENERAL_SETTINGS_REGISTRATION'),

    'email_verification' => env('GENERAL_SETTINGS_EMAIL_VERIFICATION'),

    'oauth_login' => env('GENERAL_SETTINGS_OAUTH_LOGIN'),

    'default_user' => env('GENERAL_SETTINGS_DEFAULT_USER_GROUP'),

    'default_country' => env('GENERAL_SETTINGS_DEFAULT_COUNTRY'),

    'support_email' => env('GENERAL_SETTINGS_SUPPORT_EMAIL'),

    'user_notification' => env('GENERAL_SETTINGS_USER_NOTIFICATION'),

    'user_support' => env('GENERAL_SETTINGS_USER_SUPPORT'),

    /*
    |--------------------------------------------------------------------------
    | Davinchi Settings
    |--------------------------------------------------------------------------
    */

    'default_model_admin' => env('DAVINCI_SETTINGS_DEFAULT_MODEL_ADMIN'),
    'default_model_user' => env('DAVINCI_SETTINGS_DEFAULT_MODEL_USER'),

    'default_language' => env('DAVINCI_SETTINGS_DEFAULT_LANGUAGE'),
    'tone_default_state' => env('DAVINCI_SETTINGS_TONE_DEFAULT_STATE'),
    'creativity_default_state' => env('DAVINCI_SETTINGS_CREATIVITY_DEFAULT_STATE'),
    'input_length' => env('DAVINCI_SETTINGS_INPUT_LENGTH'),

    'templates_access_admin' => env('DAVINCI_SETTINGS_TEMPLATES_ACCESS_ADMIN'),
    'templates_access_user' => env('DAVINCI_SETTINGS_TEMPLATES_ACCESS_USER'),

    'free_tier_words' => env('DAVINCI_SETTINGS_FREE_TIER_WORDS'),
    'free_tier_images' => env('DAVINCI_SETTINGS_FREE_TIER_IMAGES'),
    'image_feature_user' =>env('DAVINCI_SETTINGS_IMAGE_FEATURE_USER'),

    'max_results_limit_admin' => env('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_ADMIN'),
    'max_results_limit_user' => env('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_USER'),


];
