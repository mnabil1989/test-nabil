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

    /**
     * get the specialities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialities()
    {
        return $this->hasMany(Speciality::class,'clinic_id');
    }
}
