<?php namespace Vdomah\JWTAuth\Classes;

use Config;
use Vdomah\JWTAuth\Models\Settings;

class JWTAuthServiceProvider extends \Tymon\JWTAuth\Providers\JWTAuthServiceProvider
{

    /**
     * Helper to get the config values.
     *
     * @param  string $key
     * @return string
     */
    protected function config($key, $default = null)
    {
        $val = Settings::get('secret');

        if (!$val)
            $val = Config::get('vdomah.jwtauth::' . $key);

        return $val ?: config("jwt.$key", $default);
    }
}