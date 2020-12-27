<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'user_id',
        'start',
        'duration',
        'comments',
        'confirmed',
        'payment_confirmed'
    ];

    /**
     * Appends data to the model.
     *
     * @var array
     */
    protected $appends = [
        'title'
    ];

    public function doctorId()
    {
        return $this->belongsTo("App\Doctor", 'doctor_id');
    }
    public function userId()
    {
        return $this->belongsTo("App\User", 'user_id');
    }

    /**
     * get the notes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class,'appointment_id');
    }

    public function appointment_notes()
    {
        return $this->hasMany(AppointmentNote::class,'appointment_id');
    }

    /**
     * get the attachments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class,'appointment_id');
    }

    /**
     * get the title (for the calender).
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        return $this->doctorId->title_en;
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
        $string = str_replace('[[Appointment_start]]', $this->start, $string);
        $string = str_replace('[[Appointment_duration]]', $this->duration, $string);
        return $string;
    }

    /**
     * prepare the notification data (EMAIL & SMS).
     *
     * @param array $data
     * @return array
     */
    public function set_notification_details(array $data)
    {
        // code ...
    }
}
