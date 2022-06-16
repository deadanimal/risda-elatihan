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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => "1454056791696727",
        'client_secret' => "f8fbfcf0b3538877f60b0c77bc3da52d",
        'redirect' => "https://risda-elatihan.prototype.com.my/auth/facebook/callback",
    ],
    'google' => [
        'client_id' => "1081285377646-m8f3c2lnrm75m3se8a43lsuo6si72rc9.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => "https://risda-elatihan.prototype.com.my/auth/google/callback",
    ],

];
