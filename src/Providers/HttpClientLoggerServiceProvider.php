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
        $this->registerPublishing();
        $this->registerMigrations();
        $this->registerRoutes();
        $this->registerViews();
        Event::listen(ResponseReceived::class, LogResponseReceived::class);
        Event::listen(ConnectionFailed::class, LogConnectionFailed::class);
    }

    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'http-client-logger-migrations');
        }
    }

    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
    }

    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . "/../../resources/views",'http-logs');
    }
}