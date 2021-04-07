<?php


namespace App\Service\Geo;


use Illuminate\Support\Facades\Http;
use UAParser\Parser;

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

    public function userAgentBrowser()
    {
      $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->ua->family;

    }

    public function userAgent()
    {
        $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->os->family;
    }
}
