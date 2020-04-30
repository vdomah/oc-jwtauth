<?php namespace Vdomah\JWTAuth\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'vdomah_jwtauth_settings';

    public $settingsFields = 'fields.yaml';
}