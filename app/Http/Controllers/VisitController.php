<?php


namespace App\Http\Controllers;


use App\Service\Geo\GeoService;

class VisitController
{
    protected $data;

    public function create(GeoService $geoService)
    {

        $ip = '142.44.210.192';
        $geoService->parse($ip);
        \App\Models\Visit::create([
            'ip' => $ip,
            'continent_code' => $geoService->continentCode(),
            'country_code' => $geoService->countryCode(),
            'browser' => $geoService->userAgentBrowser(),
            'os' => $geoService->userAgentOs(),

        ]);

    }
}
