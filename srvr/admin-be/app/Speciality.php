<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Speciality extends Model
{
    use Translatable;

    /**
     * define the translatable fields.
     *
     * @var array
     */
    protected $translatable = ['name'];

    /**
     * Appends data to the model.
     *
     * @var array
     */
    protected $appends = [
        'name_en'
    ];

    /**
     * get the english name.
     *
     * @return string
     */
    public function getNameEnAttribute()
    {
        $name = $this->translations->where('column_name','name')->first();
        return $name ? $name->value : '';
    }

    /**
     * get the doctors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class,'speciality_id');
    }
}
