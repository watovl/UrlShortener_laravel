<?php

namespace App\Services;

use App\Models\UrlShortener;

class UrlShortenerService implements \App\Interfaces\UrlShortenerService
{
    private UrlShortener $urlShortener;

    public function __construct(UrlShortener $urlShortener)
    {
        $this->urlShortener = $urlShortener;
    }

    public function findShortLinkByUrl(string $url) : string|null
    {
        return $this->urlShortener->firstWhere('url', $url)?->short_link;
    }

    public function findUrlByShortLink(string $shortLink) : string|null
    {
        return $this->urlShortener->firstWhere('short_link', $shortLink)?->url;
    }

    public function createUrlShortener(string $url, string $shortLink) : void
    {
        $this->urlShortener->create([
            'url' => $url,
            'short_link' => $shortLink
        ]);
    }
}
