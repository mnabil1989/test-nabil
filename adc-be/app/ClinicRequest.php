<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ClinicRequest extends Model
{
    protected $fillable = [
        'first_name','last_name','phone','gender','email','clinic_id','type','url','further_requirements'
    ];
}
