<?php


namespace App\Service\UserAgent;


use Illuminate\Support\Facades\Http;
use UAParser\Parser;

class UserAgentService implements UserAgentServiceInterface
{

    public function userAgentBrowser()
    {
      return request()->server->get(get_browser('HTTP_USER_AGENT'));


    }

    public function userAgentOs()
    {
        $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->os->family;
    }
}
