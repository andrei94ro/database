<?php

return [
    'cache_modules'          => 'xiz_cache_modules',
    'cache_console'          => 'xiz_cache_console',
    'cache_acl_routes'       => 'xiz_cache_acl_routes',
    'cache_acl_routes_index' => 'xiz_cache_acl_routes_index',
    'cache_sidebar'          => 'xiz_cache_sidebar',
    'cache_observers'        => 'xiz_cache_observers',
    'acl_middleware_name'    => 'aclAuth',

    'xiz_modules'            => env('XIZ_MODULES'),
    'xiz_cdn'                => env('APP_XIZ_CDN'),
    'xiz_cdn_key'            => env('APP_XIZ_CDN_KEY'),
    'xiz_cdn_encryption_key' => env('APP_XIZ_CDN_ENCRYPTION_KEY'),
    'xiz_cdn_encryption_iv'  => env('APP_XIZ_CDN_ENCRYPTION_IV'),

    'use_https' => env('FORCE_HTTPS'),

    'developer_on' => env('APP_XIZ_DEVELOPER_MODE'),

    'api_allowed_ips'    => env('APP_XIZ_API_ALLOWED_IPS'),
    'api_secret_key'     => env('APP_XIZ_API_SECRET_KEY'),
    'api_protective_key' => env('APP_XIZ_API_PROTECTIVE_KEY'),
];
