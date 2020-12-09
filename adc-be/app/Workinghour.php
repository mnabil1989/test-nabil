<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Workinghour extends Model
{
    public function doctorId()
    {
        return $this->belongsTo("App\Doctor", 'doctor_id');
    }

    /**
     * get the start
     *
     * @param string $value
     * @return string
     */
    public function getStartAttribute($value)
    {
        return Carbon::parse($this->day . ' ' . $value)->toDateTimeString();
    }

    /**
     * get the end
     *
     * @param string $value
     * @return string
     */
    public function getEndAttribute($value)
    {
        return Carbon::parse($this->day . ' ' . $value)->toDateTimeString();
    }
}
