<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'google' => [
        'client_id' => '918876627864-5dat7usdd2usdrddbm2tpi7va8r2593g.apps.googleusercontent.com',
        'client_secret' => 'nKovG1BNFMvRkIQpF8FPnCRA',
        'redirect' => 'http://sc.snowball.co.za/oauth/google',
    ],

    'facebook' => [
        'client_id' => '102306226782583',
        'client_secret' => '42697741880a3d8e59f8d35a281b7adc',
        'redirect' => 'http://sc.snowball.co.za/oauth/facebook',
    ],

    'github' => [
        'client_id' => '6123eb53e160f3b45509',
        'client_secret' => '54487f35bf0493d7234100583cb6dc859914dc82',
        'redirect' => 'http://sc.snowball.co.za/oauth/github',
    ],

    'twitter' => [
        'client_id' => 'YrJriERjiCjl39a76MN7295Uo',
        'client_secret' => 'VyeadUQ9elH3qyXnLK27R91rfcGMMLt7o4BFk9BZv2llPtrrd2',
        'redirect' => 'http://sc.snowball.co.za/auth/twitter',
    ],

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

];
