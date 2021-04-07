<?php


namespace App\Http\Controllers;


use App\Service\Geo\GeoService;

class UserAgentController
{


    public function create(GeoService $geoService)
    {
        \App\Models\UserAgent::create([

            'browser' => $geoService->userAgentBrowser(),
            'os' => $geoService->userAgent(),

        ]);

    }
}
