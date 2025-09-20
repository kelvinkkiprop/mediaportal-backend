<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'storage/*',
        'videos/*',
        'upload/*', // make sure uploads are covered
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:4200',      // Frontend_dev
        'http://localhost:8000',      // Backend_local
        'https://cms.konza.go.ke',    // Frontend_prod
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        '*',
        'Authorization',
        'X-Requested-With',
        'Content-Type',
        'Accept',
        'Origin'
    ],

    'exposed_headers' => [],

    'max_age' => 0,

    // If_using_JWT_Sanctum_or_session_cookies_set_to_true
    'supports_credentials' => false, //true,

];
