<?php


namespace App\Service\UserAgent;


interface UserAgentService
{
public function continentCode();
public function userAgent();
public function countryCode();
public function parse($ip);
}
