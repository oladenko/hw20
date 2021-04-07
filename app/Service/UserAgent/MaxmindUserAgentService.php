<?php


namespace App\Service\UserAgent;


use UAParser\Parser;

class MaxmindUserAgentService implements UserAgentService
{

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
