<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
//use ScoutElastic\Searchable;

class Slider extends Model
{
	use Translatable;
	protected $translatable = ['link'];

    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\SlideIndexConfigurator::class;

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
