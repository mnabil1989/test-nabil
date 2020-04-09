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

    /**
     * get the title (for the calender).
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        return $this->doctorId->title_en;
    }
}
