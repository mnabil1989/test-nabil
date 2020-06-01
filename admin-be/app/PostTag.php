<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class PostTag extends Model
{

protected $table='post_tag';
    /**
     * @var string
     */
    protected $indexConfigurator = Indexes\OurClientIndexConfigurator::class;

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
