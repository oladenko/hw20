<?php


namespace App\Service\Geo;


class MaxmindGeoService implements GeoService
{
    protected $data;
    protected $reader;
public function __construct()
{
    $this->reader =  new \GeoIp2\Database\Reader(base_path() . DIRECTORY_SEPARATOR .
        'database'. DIRECTORY_SEPARATOR . 'geoip'. DIRECTORY_SEPARATOR .
        'GeoLite2-Country.mmdb'
    );

}

    public function continentCode()
    {
      return  $this->data->continent->code;
    }

    public function countryCode()
    {
      return   $this->data->country->isoCode;
    }

    public function parse($ip)
    {
      return $this->data =  $this->reader->country($ip);
    }

    public function userAgent()
    {
        return  $this->data->request()->server->get('HTTP_USER_AGENT');
    }
}
