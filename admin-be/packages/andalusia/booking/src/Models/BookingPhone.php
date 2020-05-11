<?php

namespace Andalusia\Booking\Models;

use Illuminate\Database\Eloquent\Model;

class BookingPhone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id',
        'phone'
    ];

    /**
     * get the booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    /**
     * set the phone.
     *
     * @param string $value
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = substr($value, -9);
    }
}
