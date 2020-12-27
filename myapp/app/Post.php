<?php

namespace App;

use App\Indexes\PostIndexConfigurator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use ScoutElastic\Searchable;

class Post extends Model
{
    use Translatable, Resizable;

    protected $translatable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords'];

    const PUBLISHED = 'PUBLISHED';

    protected $guarded = [];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\PostIndexConfigurator::class;


    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];
    public function toSearchableArray()
    {
        return array_merge(
        // By default all model fields will be indexed
//            Tag::toSearchableArray(),
            ['author_name' => $this->tag]
        );
    }
    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
//            'title' => [
//                "type" => "text",
//                "index"=>"not_analyzed"
//            ]

        ]
    ];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        parent::save();
    }

    public function authorId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'author_id', 'id');
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }


    public function category()
    {
        return $this->belongsTo('App\Category')->with('translations');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag')->with('translations')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

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
}
