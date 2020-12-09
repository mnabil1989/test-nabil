<?php

namespace Andalusia\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'thumbnail',
        'link',
        'message',
        'type',
        'is_read'
    ];

    /**
     * get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(App\User::class, 'user_id');
    }

    /**
     * set is_read.
     *
     * @param bool $value
     * @return void
     */
    public function setIsReadAttribute($value)
    {
        $value ? $this->attributes['is_read'] = $value : $this->attributes['is_read'] = $this->is_read;
    }

    /**
     * set the link.
     *
     * @param string $value
     * @return void
     */
    public function setLinkAttribute($value)
    {
        $value ? $this->attributes['link'] = $value : $this->attributes['link'] = $this->link;
    }

    /**
     * set the message.
     *
     * @param string $value
     * @return void
     */
    public function setMessageAttribute($value)
    {
        $value ? $this->attributes['message'] = $value : $this->attributes['message'] = $this->message;
    }

    /**
     * set the type.
     *
     * @param string $value
     * @return void
     */
    public function setTypeAttribute($value)
    {
        $value ? $this->attributes['type'] = $value : $this->attributes['type'] = $this->type;
    }
}
