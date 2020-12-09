<?php

namespace Andalusia\Booking\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Clinic extends Model
{
    use Translatable;
    protected $translatable = ['small_description','description','address','meta_keywords','meta_description'];

    /**
     * get the doctors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany(doctor::class, 'doctor_id');
    }
}
