<?php

namespace App;
use App\Indexes\CategoryIndexConfigurator;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Category extends Model
{
    use Translatable;
    protected $translatable = ['name','slug'];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\CategoryIndexConfigurator::class;

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

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany('App\Post')
            ->published()->with('translations')->withCount('user')
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

}
