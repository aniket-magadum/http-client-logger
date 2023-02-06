<?php

namespace AniketMagadum\HttpClientLogger\Providers;

use AniketMagadum\HttpClientLogger\Listeners\LogConnectionFailed;
use AniketMagadum\HttpClientLogger\Listeners\LogResponseReceived;
use Event;
use Illuminate\Http\Client\Events\ConnectionFailed;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Support\ServiceProvider;

class HttpClientLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(ResponseReceived::class, LogResponseReceived::class);
        Event::listen(ConnectionFailed::class, LogConnectionFailed::class);
    }
}