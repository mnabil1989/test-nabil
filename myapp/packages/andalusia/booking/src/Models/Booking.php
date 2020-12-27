<?php

namespace Andalusia\Booking\Models;

use Illuminate\Database\Eloquent\Model;
use Andalusia\Booking\Traits\Bookable;

class Booking extends Model
{
    use Bookable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appointment_id',
        'user_id',
        'patient_name',
        'date',
        'booking_confirmed',
        'payment_confirmed',
        'notes'
    ];

    /**
     * get the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    /**
     * get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * get the title (for the calender).
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        return "{$this->appointment->id} - {$this->appointment->doctor->title_en}";
    }

    /**
     * get the start (for the calender).
     *
     * @return string
     */
    public function getStartAttribute()
    {
        return \Carbon\Carbon::parse("{$this->date} {$this->appointment->from}");
    }

    /**
     * get the end (for the calender).
     *
     * @return string
     */
    public function getEndAttribute()
    {
        return \Carbon\Carbon::parse("{$this->date} {$this->appointment->to}");
    }


    /**
     * set the user id.
     *
     * @return void
     */
    public function setUserIdAttribute()
    {
        if(auth('api')->user())
            $this->attributes['user_id'] = auth('api')->id();
    }

    /**
     * set the notes.
     *
     * @param string $value
     * @return void
     */
    public function setNotesAttribute($value)
    {
        if($value == '' || !$value)
        {
            $this->attributes['notes'] = "
                From: {$this->appointment->from}
                To: {$this->appointment->to}
            ";
        }

    }
}
