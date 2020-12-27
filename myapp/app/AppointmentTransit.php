<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AppointmentTransit extends Model
{
    protected $fillable = [
        'doctor_id',
        'user_id',
        'appointment_id',
        'start',
        'duration',
        'comments',
        'confirmed',
        'payment_confirmed',
        'order_id',
        'status'
    ];
    protected $table='appointment_transits';

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
     * replace strings with related attributes.
     *
     * @return string
     */
    public function replace_attributes($setting_key)
    {
        $string = str_replace('[[user_name]]', $this->appointment->userId->name, setting($setting_key));
        $string = str_replace('[[user_email]]', $this->appointment->userId->email, $string);
        $string = str_replace('[[user_phone]]', '05'.$this->appointment->userId->phone, $string);
        $string = str_replace('[[doctor_name]]', $this->appointment->doctorId->title_en, $string);
        $string = str_replace('[[doctor_email]]', $this->appointment->doctorId->email, $string);
        $string = str_replace('[[doctor_photo]]',url($this->appointment->doctorId->photo), $string);
        $string = str_replace('[[doctor_price]]', $this->appointment->doctorId->price, $string);
        $string = str_replace('[[Appointment_start]]', $this->appointment->start, $string);
        $string = str_replace('[[Appointment_duration]]', $this->appointment->duration, $string);
        $string = str_replace('[[confirmed]]', $this->confirmed, $string);
        $string = str_replace('[[payment_confirmed]]', $this->payment_confirmed, $string);
        $string = str_replace('[[order_id]]', $this->order_id, $string);
        $string = str_replace('[[status]]', $this->status, $string);

        return $string;
    }
}
