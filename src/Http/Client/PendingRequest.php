<?php

namespace AniketMagadum\HttpClientLogger\Http\Client;

use Illuminate\Http\Client\Request;

class PendingRequest extends \Illuminate\Http\Client\PendingRequest
{
    public function __construct(Factory $factory = null)
    {
        parent::__construct($factory);
    }
}