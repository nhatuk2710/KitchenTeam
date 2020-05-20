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

//    'google' => [
//        'client_id' => env('GOOGLE_CLIENT_ID'),
//        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
//        'redirect' => env('GOOGLE_REDIRECT_URI', env('APP_URL')) . '/social/google/callback',
//    ],
    'google' => [
    'client_id' => ' 979922513056-oio51on9iuoqad1ame14npp4u3qh1f9a.apps.googleusercontent.com',
    'client_secret' => ' Mb7e5nPWiioRKS58sUR5o6yd',
    'redirect' => 'http://karluk.herokuapp.com/auth/google/callback',
        ],

    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID'),
        'client_secret' => env('FACEBOOK_APP_SECRET'),
        'redirect' => env('FACEBOOK_APP_CALLBACK_URL'),
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
