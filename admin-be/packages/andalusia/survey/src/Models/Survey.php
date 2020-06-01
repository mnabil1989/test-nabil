<?php

namespace Andalusia\Survey\Models;

use Symfony\Component\Console\Question\Question;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use Translatable;

    /**
     * Voyager translatable attributes.
     *
     * @var array
     */
    protected $translatable = ['slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'same_page',
        'popup_type',
        'popup_timer',
        'number_of_questions_on_page',
        'slug',
        'note',
        'redirect_link'
    ];

    /**
     * get the questions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class, 'survey_id');
    }

    /**
     * get the users info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users_info()
    {
        return $this->hasMany(SurveyUserInfo::class, 'survey_id');
    }
}
