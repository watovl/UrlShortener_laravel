<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class UrlShortenerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Interfaces\UrlShortenerService::class,
            \App\Services\UrlShortenerService::class
        );
        $this->app->bind(
            \App\Interfaces\GeneratorShortLink::class,
            \App\Services\CreatorShortLink::class
        );
        $this->app->bind(
            \App\Interfaces\ValidatorHttp::class,
            \App\Services\ValidatorUrl::class
        );
        $this->app->bind(
            \App\Interfaces\Hash::class,
            function () {
                $algorithm = Config::get('shortlinkhashing.algorithm');
                return new \App\Services\HashUrl($algorithm);
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
