<?php

namespace App\Interfaces;

interface ValidatorHttp
{
    public function validingUrl(string $url) : string;
}
