<?php namespace Vdomah\JWTAuth;

use Config;
use RainLab\User\Models\User;
use System\Classes\PluginBase;
use App;
use Illuminate\Foundation\AliasLoader;
use Vdomah\JWTAuth\Models\Settings;

class Plugin extends PluginBase
{
    /**
     * @var array   Require the RainLab.User plugin
     */
    public $require = ['RainLab.User'];

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'vdomah.jwtauth::lang.settings.page_name',
                'description' => 'vdomah.jwtauth::lang.settings.page_desc',
                'category'    => 'vdomah.jwtauth::lang.plugin.name',
                'icon'        => 'oc-icon-key',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'jwt jwtauth',
                'permissions' => ['vdomah.jwtauth.settings']
            ]
        ];
    }

    public function boot()
    {
        if (empty(Config::get('auth'))) {
            Config::set('auth', Config::get('vdomah.jwtauth::auth'));
        }

        $this->app->bind(\Illuminate\Auth\AuthManager::class, function($app){
            return new \Illuminate\Auth\AuthManager($app);
        });

        App::register('\Vdomah\JWTAuth\Classes\JWTAuthServiceProvider');

        $facade = AliasLoader::getInstance();
        $facade->alias('JWTAuth', '\Tymon\JWTAuth\Facades\JWTAuth');
        $facade->alias('JWTFactory', '\Tymon\JWTAuth\Facades\JWTFactory');

        App::singleton('auth', function ($app) {
            return new \Illuminate\Auth\AuthManager($app);
        });

        $this->app['router']->middleware('jwt.auth', '\Tymon\JWTAuth\Middleware\GetUserFromToken');
        $this->app['router']->middleware('jwt.refresh', '\Tymon\JWTAuth\Middleware\RefreshToken');

        User::extend(function($model) {
            $model->addDynamicMethod('getAuthApiAttributes', function () {
                return [];
            });
        });
    }
}
