<?php

namespace App\Interfaces;

interface GeneratorShortLink
{
    public function makeShortLink(string $url) : string;
}
