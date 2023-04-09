<?php

namespace App\Http\Controllers;

use App\Interfaces\{GeneratorShortLink, UrlShortenerService};
use Illuminate\Http\Request;

class ShortenerController extends Controller
{
    private UrlShortenerService $urlShortener;

    public function __construct(UrlShortenerService $urlShortener)
    {
        $this->urlShortener = $urlShortener;
    }

    public function getShortLink(Request $request, GeneratorShortLink $generator)
    {
        $url = $request->input('url');

        $shortLink = $this->urlShortener->findShortLinkByUrl($url);
        if (isset($shortLink))
        {
            return response($shortLink);
        }
        $shortLink = $generator->makeShortLink($url);
        $this->urlShortener->createUrlShortener($url, $shortLink);
        return response($shortLink, 201);
    }

    public function getUrl(string $shortLink)
    {
        $url = $this->urlShortener->findUrlByShortLink($shortLink);
        if (!isset($url))
        {
            return response('Short link is not valid', 400);
        }
        return redirect($url);
    }
}
