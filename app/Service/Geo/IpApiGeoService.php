<?php


namespace App\Service\Geo;


use Illuminate\Support\Facades\Http;

class IpApiGeoService implements GeoService
{
    protected $data;


    public function continentCode()
    {
        return  $this->data['continentCode'];
    }

    public function countryCode()
    {
        return   $this->data['countryCode'];
    }

    public function parse($ip)
    {
 $response = Http::get('http://ip-api.com/json/'. $ip . '?fields=continentCode,countryCode');
 $this->data = $response->json();
    }
}
