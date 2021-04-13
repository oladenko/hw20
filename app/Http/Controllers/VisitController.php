<?php


namespace App\Http\Controllers;


use Hillel\Geo\GeoService;
use Hillel\UsAg\UserAgentService;

class VisitController
{
//    protected $data;

    public function create(GeoService $geoService, UserAgentService $userAgent )
    {

        $ip = '142.44.210.192';
        $geoService->parse($ip);
        $user = request()->server->get('HTTP_USER_AGENT');
        \App\Models\Visit::create([
            'ip' => $ip,
            'browser' => $userAgent->userAgentBrowser(),
            'os' => $userAgent->userAgent(),
            'continent_code' => $geoService->continentCode(),
            'country_code' => $geoService->countryCode(),


        ]);

    }
}
