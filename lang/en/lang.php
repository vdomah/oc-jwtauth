<?php return [
    'plugin' => [
        'name' => 'JWTAuth',
        'description' => 'Provides token based authentication'
    ],
    'fields' => [
        'secret' => 'Secret Key',
        'secret_comment' => 'Overrides JWT_SECRET from .env',
        'btn_generate' => 'Generate Secret Key',
        'signup_fields' => 'Signup Fields',
        'signup_fields_comment' => 'Defaults are email, password, password_confirmation',
        'login_fields' => 'Login Fields',
        'login_fields_comment' => 'Defaults are email, password',
        'urls_section' => 'Endpoints',
        'url_prefix' => 'Prefix',
        'url_login' => 'Login',
        'url_signup' => 'Signup',
        'url_refresh' => 'Refresh',
        'url_invalidate' => 'Invalidate',
    ],
    'settings' => [
        'page_name' => 'JWTauth settings',
        'page_desc' => 'Configure jwt-auth',
    ],
];