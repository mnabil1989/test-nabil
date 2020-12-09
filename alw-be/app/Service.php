<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Service extends Model
{
    use Translatable;
//    ,Searchable;
    protected $translatable = ['title','title_description','slug','small_description','description','meta_keywords','meta_description'];
}
