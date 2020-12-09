<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;
class SellingPoint extends Model
{
    use Translatable;
    protected $translatable = ['title','description'];
}

