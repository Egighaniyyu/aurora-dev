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

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    * Methods allowed for accessing the resource.
    *
    * @array
    */
    'allowed_methods' => [
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
        'OPTIONS',
    ],

    /*
    * Paths that are exempt from CORS checks.
    *
    * @array
    */
    'allowed_origins' => [
        '*', // Allow requests from all origins (replace with specific origins for production)
    ],

    'allowed_origins_patterns' => [],

    /*
    * Allowed headers that can be sent with the request.
    *
    * @array
    */
    'allowed_headers' => [
        'Content-Type',
        'X-Requested-With',
        'Authorization',
    ],

    /*
    * Exposed headers that are included in the response.
    *
    * @array
    */
    'exposed_headers' => [
        'X-Powered-By',
    ],

    /*
    * Maximum age for the CORS cache option.
    *
    * @int
    */
    'max_age' => 3600,

    /*
    * Supports credentials for cookies, authorization headers or TLS client certificates.
    *
    * @bool
    */
    'supports_credentials' => false,
];
