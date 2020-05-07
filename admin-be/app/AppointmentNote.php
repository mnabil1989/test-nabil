<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AppointmentNote extends Model
{
    protected $fillable=['appointment_id','doctor_id','user_id','note','created_by'];
    public function doctorId()
    {
        return $this->belongsTo("App\Doctor", 'doctor_id');
    }
    public function userId()
    {
        return $this->belongsTo("App\User", 'user_id');
    }
    public function appointmentId()
    {
        return $this->belongsTo("App\Appointment", 'appointment_id');
    }

    /**
     * replace strings with related attributes.
     *
     * @return string
     */
    public function replace_attributes($setting_key)
    {
        $string = str_replace('[[user_name]]', $this->userId->name, setting($setting_key));
        $string = str_replace('[[user_email]]', $this->userId->email, $string);
        $string = str_replace('[[user_phone]]', '05'.$this->userId->phone, $string);
        $string = str_replace('[[doctor_name]]', $this->doctorId->title_en, $string);
        $string = str_replace('[[doctor_email]]', $this->doctorId->email, $string);
        $string = str_replace('[[doctor_photo]]',url($this->doctorId->photo), $string);
        $string = str_replace('[[doctor_price]]', $this->doctorId->price, $string);
        $string = str_replace('[[Appointment_start]]', $this->appointmentId->start, $string);
        $string = str_replace('[[Appointment_duration]]', $this->appointmentId->duration, $string);
        $string = str_replace('[[note]]', $this->note, $string);
        return $string;
    }
}
