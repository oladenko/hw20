<?php


namespace App\Service\Geo;


interface GeoService
{
public function continentCode();
//public function userAgentBrowser();
//public function userAgentOs();
public function countryCode();
public function parse($ip);
}
