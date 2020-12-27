<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Attachment extends Model
{
    /**
     * the attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['appointment_id', 'attachment'];

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
     * get the attachment.
     *
     * @param string $value
     * @return string
     */
    public function getAttachmentAttribute($value)
    {
        return env('APP_URL') . '/storage/' . $value;
    }
}
