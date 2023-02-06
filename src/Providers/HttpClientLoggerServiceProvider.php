<?php

namespace AniketMagadum\HttpClientLogger\Providers;

use Illuminate\Support\ServiceProvider;

class HttpClientLoggerServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Illuminate\Http\Client\Events\ResponseReceived' => [
            'AniketMagadum\HttpClientLogger\Listeners\LogResponseReceived',
        ],
        'Illuminate\Http\Client\Events\ConnectionFailed' => [
            'AniketMagadum\HttpClientLogger\Listeners\LogConnectionFailed',
        ],
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}