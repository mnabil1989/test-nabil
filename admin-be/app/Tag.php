<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Tag extends Model
{
    use Translatable;
//        ,Searchable;
    protected $translatable = ['name','slug','description'];
    public function post()
    {
        return $this->belongsToMany('App\Post')->published()->with('translations')->withCount('user')->withTimestamps();
    }
}
