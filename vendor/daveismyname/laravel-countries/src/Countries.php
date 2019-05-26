<?php
namespace Daveismyname\Countries;

/**
 * Class to work with countries
 */
class Countries
{
    /**
     * get json array of countries
     * @return object countries
     */
    public function all()
    {
        return json_decode(file_get_contents(__DIR__.'/countries.json'));
    }
}