<?php


namespace App\Http\Controllers;


use Hillel\Geo\GeoService;
use Hillel\UsAg\UserAgentService;

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
