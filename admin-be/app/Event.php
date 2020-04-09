<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Event extends Model
{
    use Translatable,Searchable;
    protected $translatable = ['description','meta_keywords','meta_description'];
}
