<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;
class Testimonial extends Model
{
    use Translatable;
    protected $translatable = ['description'];
}
