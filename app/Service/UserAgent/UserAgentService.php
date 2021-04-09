<?php


namespace App\Service\UserAgent;


use Illuminate\Support\Facades\Http;
use UAParser\Parser;

class UserAgentService implements UserAgentServiceInterface
{
    public function parse()
    {
        $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
       return  $result = $parser->parse($userAgent);
    }

    public function userAgentBrowser()
    {
        $result = new \WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
      return $result->browser->toString();
//          request()->server->get(get_browser('HTTP_USER_AGENT'));


    }

    public function userAgent()
    {
        $userAgent = request()->server->get('HTTP_USER_AGENT');
        $parser = Parser::create();
        $result = $parser->parse($userAgent);
        return $result->os->family;
    }
}
