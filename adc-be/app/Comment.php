<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'comment' ,'image'
    ];

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
        return env('APP_URL') . '/storage/' . str_replace('\\', '/', $value);
    }

    /**
     * get the comment
     *
     * @param string $value
     * @return string
     */
    public function getCommentAttribute($value)
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
