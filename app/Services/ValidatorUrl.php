<?php

namespace App\Services;

class ValidatorUrl implements \App\Interfaces\ValidatorHttp
{
    public function validingUrl(string $url) : string
    {
        return $this->isValidHttp($url) ? $url : 'https://' . $url;
    }

    private function isValidHttp(string $input) : bool
    {
        $patternHttp = "/^https?:\/\//"; //http(s)://
        return preg_match($patternHttp, $input) === 1;
    }
}
