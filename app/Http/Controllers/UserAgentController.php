<?php


namespace App\Http\Controllers;


use App\Service\Geo\GeoService;
use App\Service\UserAgent\UserAgentService;

class UserAgentController
{


    public function create(UserAgentService $userAgent )
    {

        $user = request()->server->get('HTTP_USER_AGENT');
        $userAgent->parse($user);
        \App\Models\UserAgent::create([

            'browser' => $userAgent->userAgentBrowser(),
            'os' => $userAgent->userAgent(),

        ]);

    }
}
