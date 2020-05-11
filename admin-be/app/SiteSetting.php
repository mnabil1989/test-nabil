<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use TCG\Voyager\Events\SettingUpdated;

class SiteSetting extends Model
{
    protected $table = 'seo_settings';

    protected $guarded = [];

    public $timestamps = false;

//    protected $dispatchesEvents = [
//        'updating' => SettingUpdated::class,
//    ];
}
