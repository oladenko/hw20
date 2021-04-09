<?php


namespace App\Service\Geo;


interface GeoService
{
public function continentCode();

public function countryCode();
public function parse($ip);
}
