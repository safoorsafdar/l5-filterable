<?php

namespace SafoorSafdar\Filterable\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * Class FilterableFacade
 *
 * @package SafoorSafdar\Filterable\Facades
 */
class FilterableFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'filterable';
    }
}
