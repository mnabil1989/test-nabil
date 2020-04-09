<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class DataRaw extends Model
{
    //For Languages
    protected $table='data_rows';
    protected $guarded = [];

    public $timestamps = false;
}
