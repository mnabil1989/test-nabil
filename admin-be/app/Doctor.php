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
    protected $translatable = ['description','position','speciality','meta_keywords','meta_description'];
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
}
