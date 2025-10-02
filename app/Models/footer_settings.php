<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class footer_settings extends Model
{
    protected $table = 'footer_settings';
  
    
    protected $fillable = [
        'logo', 'about_text', 'facebook', 'instagram', 'linkedin', 'twitter',
        'address', 'email', 'phone'
    ];

        public $timestamps = true;

    // convenience methods
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    
}
