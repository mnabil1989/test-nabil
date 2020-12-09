<?php

namespace App;

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Doctor extends Model
{
    use Translatable
//        ,Searchable
        ;
    protected $fillable = ['photo'];
    protected $translatable = ['title','slug','small_description','description','position','speciality','meta_keywords','meta_description','address'];
    protected $searchRules = [
        //
    ];

    // Here you can specify a mapping for a model fields.
    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'string',
                'fields' => [
                    'raw' => [
                        'type' => 'string',
                        'index' => 'not_analyzed',
                    ]
                ]
            ],
            'type' => [
                'type' => 'string',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                        'index' => 'not_analyzed',
                    ]
                ]
            ],
            'start_date' => [
                'type' => 'date',
            ]
        ]
    ];
    public function clinicId()
    {
        return $this->belongsTo("App\Clinic", 'clinic_id');
    }

    /**
     * get the english position.
     *
     * @return string
     */
    public function getPositionEnAttribute()
    {
        $position = $this->translations->where('column_name','position')->first();
        return $position ? $position->value : '';
    }

    /**
     * get the speciality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality_rel()
    {
        return $this->belongsTo(Speciality::class,'speciality_id');
    }

    /**
     * get the appointments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'doctor_id');
    }

    /**
     * get the photos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class,'doctor_id');
    }

    /**
     * get the notes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    /**
     * get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class,'doctor_id');
    }

    /**
     * get the working hours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function working_hours()
    {
        return $this->hasMany(Workinghour::class,'doctor_id')->orderByRaw("FIELD(day, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday' ,'Thursday', 'Friday')");
    }

    /**
     * get the photo.
     *
     * @param string $value
     * @return string
     */
    public function getPhotoAttribute($value)
    {
        if(filter_var($value, FILTER_VALIDATE_URL))
            return $value;
//        return url('/storage/'.str_replace('\\', '/', $value));
        return env('APP_URL') . '/storage/' . str_replace('\\', '/', $value);
    }

    /**
     * get the description
     *
     * @param string $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        if(request()->html == 'false')
        {
            $value = strip_tags($value);
            $value = str_replace('&nbsp;', '', $value);
            $value = str_replace(["\n", "\r"], ' ', $value);
        }
        return $value;
    }
}
