<?php

namespace App\Indexes;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class SlideIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}