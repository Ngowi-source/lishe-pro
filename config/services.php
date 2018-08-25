<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', '352237828646922'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', '44f69779fd413501960754290e40ad2e'),
        'redirect' => 'https://lishep.herokuapp.com/auth/callback/facebook',
    ],

    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID', '38Ofghzs2iy76eTsnUmR5YjvC'),
        'client_secret' => env('TWITTER_CLIENT_SECRET', 'BntZxIL8cKTrFfkvNWoF7H3gZwngD8iVU3OVrb7dt83gde7yvL '),
        'redirect' => 'https://lishep.herokuapp.com/auth/callback/twitter',
    ],

    'google' => [
        'client_id' => env('GP_CLIENT_ID', '1041036215480-vj9vs3hblrhpcjm4hnpbo3qr058qegiv.apps.googleusercontent.com'),
        'client_secret' => env('GP_CLIENT_SECRET', '0D264_AK4JoFgXBN51F_TYwX'),
        'redirect' => 'https://lishep.herokuapp.com/auth/callback/google',
    ],

];
