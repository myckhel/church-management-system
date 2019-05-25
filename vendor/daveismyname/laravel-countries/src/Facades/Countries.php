<?php

namespace Daveismyname\Countries\Facades;

use Illuminate\Support\Facades\Facade;

class Countries extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'countries';
    }
}
