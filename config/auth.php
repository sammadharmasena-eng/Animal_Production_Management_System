<?php

return [

    'defaults' => [
        'guard' => 'web', // default user guard
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        // Farmer guard
        'farmer' => [
            'driver' => 'session',
            'provider' => 'farmers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        // Default user provider
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Farmer provider
        'farmers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Farmer::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        // (Optional) Farmer password reset config
        'farmers' => [
            'provider' => 'farmers',
            'table' => 'password_resets', // same table can be reused
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];