<?php


namespace App\Service\UserAgent;


use UAParser\Parser;

class MaxmindUserAgentService implements UserAgentService
{
//    protected $data;
//    protected $reader;
//public function __construct()
//{
//    $this->reader =  new \GeoIp2\Database\Reader(base_path() . DIRECTORY_SEPARATOR .
//        'database'. DIRECTORY_SEPARATOR . 'geoip'. DIRECTORY_SEPARATOR .
//        'GeoLite2-Country.mmdb'
//    );
//
//}

//    public function continentCode()
//    {
//      return  $this->data->continent->code;
//    }
//
//    public function countryCode()
//    {
//      return   $this->data->country->isoCode;
//    }
//
//    public function parse($ip)
//    {
//      return $this->data =  $this->reader->country($ip);
//    }

    public function userAgentBrowser()
    {
        $userAgent = $this->data->request()->server->get('HTTP_USER_AGENT');
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
