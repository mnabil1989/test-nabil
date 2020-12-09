<?php

namespace Andalusia\Booking\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Doctor extends Model
{
    use Translatable;
    protected $translatable = ['description','position','speciality','meta_keywords','meta_description'];

    /**
     * get the appointments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'appointment_id');
    }

    /**
     * get the clinic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
