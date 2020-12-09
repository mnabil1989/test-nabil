<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;


class AndalusiaGroup extends Model
{
    use Translatable;

    protected $translatable = ['title', 'url'];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\FeatureIndexConfigurator::class;

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
