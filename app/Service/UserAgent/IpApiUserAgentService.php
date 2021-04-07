<?php


namespace App\Service\UserAgent;


use Illuminate\Support\Facades\Http;
use UAParser\Parser;

class IpApiUserAgentService implements UserAgentService
{

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
