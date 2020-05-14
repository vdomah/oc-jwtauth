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
        'section_routes_disable' => 'Disable routes',
        'is_login_disabled' => 'Login route disabled',
        'is_signup_disabled' => 'Signup route disabled',
        'is_refresh_disabled' => 'Refresh route disabled',
        'is_invalidate_disabled' => 'Invalidate route disabled',
    ],
    'settings' => [
        'page_name' => 'JWTauth settings',
        'page_desc' => 'Configure jwt-auth',
    ],
];