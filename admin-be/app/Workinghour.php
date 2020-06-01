<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Workinghour extends Model
{
    public function doctorId()
    {
        return $this->belongsTo("App\Doctor", 'doctor_id');
    }
}
