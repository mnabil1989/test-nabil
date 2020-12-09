<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * get the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class,'appointment_id');
    }

    /**
     * Get the owning noteable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function noteable()
    {
        return $this->morphTo();
    }
}
