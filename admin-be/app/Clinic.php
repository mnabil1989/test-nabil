<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Clinic extends Model
{
    use Translatable;
//        ,Searchable;
    protected $translatable = ['small_description','description','address','meta_keywords','meta_description'];
}
