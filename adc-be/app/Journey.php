<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;
class Journey extends Model
{
    use Translatable;
    protected $translatable = ['title','slug','small_description','description'];

}
