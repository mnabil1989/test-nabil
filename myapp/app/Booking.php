<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'clinic_id', 'doctor_id', 'workinghour_id', '', 'name', 'email','phone','comments','booking_date_time'
    ];

    /**
     * set the booking date time
     *
     * @return void
     */
    public function setBookingDateTimeAttribute()
    {
        if(request()->workinghour_id)
        {
            $working_hour = Workinghour::find(request()->workinghour_id);
            $this->attributes['booking_date_time'] = $working_hour->day . ' (' . $working_hour->start . ' - ' . $working_hour->end . ')';
        }
    }
}
