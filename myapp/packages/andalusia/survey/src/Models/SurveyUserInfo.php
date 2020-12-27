<?php

namespace Andalusia\Survey\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyUserInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'survey_user_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_id', 'user_id', 'email', 'phone', 'is_survey_closed'
    ];

    /**
     * get the survey.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    /**
     * get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    /**
     * get the users answers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users_answers()
    {
        return $this->hasMany(SurveyUserAnswer::class,'user_info_id');
    }

    /**
     * set the user id.
     *
     * @return void
     */
    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth('api')->user() ? auth('api')->id() : null;
    }
}
