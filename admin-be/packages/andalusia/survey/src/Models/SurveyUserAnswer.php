<?php

namespace Andalusia\Survey\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyUserAnswer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'survey_user_answer';

    /**
     * The attributes that are mass assignable.
     * Please note that: answer field will be required only if the form_type in SurveyQuestion is textarea
     *
     * @var array
     */
    protected $fillable = [
        'user_info_id', 'answer_id', 'answer_text'
    ];

    /**
     * get the user info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_info()
    {
        return $this->belongsTo(SurveyUserInfo::class, 'user_info_id');
    }

    /**
     * get the answer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(SurveyAnswer::class, 'answer_id');
    }
}