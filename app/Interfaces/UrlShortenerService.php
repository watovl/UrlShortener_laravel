<?php

namespace App\Interfaces;

interface UrlShortenerService
{
    public function findShortLinkByUrl(string $url) : string|null;
    public function findUrlByShortLink(string $shortLink) : string|null;
    public function createUrlShortener(string $url, string $shortLink) : void;
}
