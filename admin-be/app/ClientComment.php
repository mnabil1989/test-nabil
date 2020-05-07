<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use ScoutElastic\Searchable;


class ClientComment extends Model
{
    use Translatable;
    protected $translatable = ['name', 'job','comment'];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\ClientCommentIndexConfigurator::class;

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
