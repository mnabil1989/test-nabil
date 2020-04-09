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
        'survey_id', 'email', 'phone', 'is_survey_closed'
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
     * get the users answers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users_answers()
    {
        return $this->hasMany(SurveyUserAnswer::class,'user_info_id');
    }
}