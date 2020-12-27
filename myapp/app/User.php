<?php

namespace App;

use App\Indexes\UserIndexConfigurator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use ScoutElastic\Searchable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','phone','address','gender','avatar','doctor_id', 'reset_token' ,'government_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\UserIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
            //
        ]
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function favorite_posts()
    {
        return $this->belongsToMany('App\Post')->with('translations')->withCount('user');
    }
    public function favorite_events()
    {
        return $this->belongsToMany('App\Event');
    }

    /**
     * get the appointments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'user_id')->with('appointment_notes');
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
     * get the doctor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    /**
     * get the surveys user info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys_user_info()
    {
        return $this->hasMany(\Andalusia\Survey\Models\SurveyUserInfo::class,'user_id');
    }

    /**
     * replace strings with related attributes.
     *
     * @return string
     */
    public function replace_attributes($setting_key)
    {
        $string = str_replace('[[user_name]]', $this->name, setting($setting_key));
        return $string;
    }

    /**
     * get the avatar
     *
     * @param string $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) ? $value : env('APP_URL') . '/storage/' . $value;
    }
}
