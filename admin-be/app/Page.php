<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable;
    protected $translatable = ['title','body','slug', 'meta_description', 'meta_keywords'];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\PageIndexConfigurator::class;

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
}
