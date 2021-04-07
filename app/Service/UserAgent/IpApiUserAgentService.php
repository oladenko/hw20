<?php


namespace App\Service\UserAgent;


use Illuminate\Support\Facades\Http;

class IpApiUserAgentService implements UserAgentService
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

    public function userAgent()
    {
        return  request()->server->get('HTTP_USER_AGENT');
    }
}
