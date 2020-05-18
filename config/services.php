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
    'client_id' => ' 979922513056-p3afvouf4rps9gj53bmon9i14b6lvj4c.apps.googleusercontent.com',
    'client_secret' => ' krtjV9xulsHKmI713cGz3qFf',
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
