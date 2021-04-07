<?php


namespace App\Service\UserAgent;


use Illuminate\Support\Facades\Http;
use UAParser\Parser;

class IpApiUserAgentService implements UserAgentService
{
//    protected $data;
//
//
//    public function continentCode()
//    {
//        return  $this->data['continentCode'];
//    }
//
//    public function countryCode()
//    {
//        return   $this->data['countryCode'];
//    }
//
//    public function parse($ip)
//    {
// $response = Http::get('http://ip-api.com/json/'. $ip . '?fields=continentCode,countryCode');
// $this->data = $response->json();
//    }
//
    public function userAgentBrowser()
    {
      $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->ua->family;

    }

    public function userAgentOs()
    {
        $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->os->family;
    }
}
