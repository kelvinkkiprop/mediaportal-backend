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

    // 'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'storage/*',
        'videos/'
    ],

    'allowed_methods' => ['*'],

    // 'allowed_origins' => ['*'],

    // Allow_only_Angular_dev_and_production_domain
    'allowed_origins' => [
        'http://localhost:4200',
        'http://localhost:8000',
        'https://cms.konza.go.ke',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
