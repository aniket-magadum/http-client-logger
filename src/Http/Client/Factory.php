<?php

namespace AniketMagadum\HttpClientLogger\Http\Client;
use AniketMagadum\HttpClientLogger\Http\Client\PendingRequest;

class Factory extends \Illuminate\Http\Client\Factory
{
    protected function newPendingRequest()
    {
        return new PendingRequest($this);
    }
}