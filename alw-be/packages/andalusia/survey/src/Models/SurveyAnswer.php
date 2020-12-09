<?php

namespace Andalusia\Survey\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'survey_answer';

    /**
     * The attributes that are mass assignable.
     * just a reminder: if form_type in SurveyQuestion is textarea or text automatic row will be generated & answer will be empty (or automatically show input to get the points for the answered question)
     * as the user will have to type his/her opinion no limits!
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'order', 'answer', 'points'
    ];

    /**
     * get the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'question_id');
    }
}
