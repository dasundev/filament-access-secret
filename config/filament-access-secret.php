<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Access Secret Key
    |--------------------------------------------------------------------------
    |
    | Set this to a secure value to restrict access to Filament admin panel.
    |
    */

    'key' => env('FILAMENT_ACCESS_SECRET_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Access Secret Cookie
    |--------------------------------------------------------------------------
    |
    | To use your own access secret cookie, set it here.
    |
    */

    'cookie' => \Dasundev\FilamentAccessSecret\DefaultAccessSecretCookie::class,
];
