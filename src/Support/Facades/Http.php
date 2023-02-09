<?php

namespace AniketMagadum\HttpClientLogger\Support\Facades;

use AniketMagadum\HttpClientLogger\Http\Client\Factory;

class Http extends \Illuminate\Support\Facades\Http
{
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}