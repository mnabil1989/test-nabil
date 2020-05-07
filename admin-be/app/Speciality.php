<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Speciality extends Model
{
    use Translatable;

    /**
     * define the translatable fields.
     *
     * @var array
     */
    protected $translatable = ['name'];

    /**
     * Appends data to the model.
     *
     * @var array
     */
    protected $appends = [
        'name_en'
    ];

    /**
     * get the english name.
     *
     * @return string
     */
    public function getNameEnAttribute()
    {
        $name = $this->translations->where('column_name','name')->first();
        return $name ? $name->value : '';
    }

    /**
     * get the image.
     *
     * @param string $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if(filter_var($value, FILTER_VALIDATE_URL))
            return $value;
        return env('APP_URL') . '/storage/' . $value;
    }

    /**
     * get the doctors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class,'speciality_id');
    }

    /**
     * get the clinic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
}
