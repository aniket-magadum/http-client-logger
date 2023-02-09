<?php

namespace AniketMagadum\HttpClientLogger\Models;
use Illuminate\Database\Eloquent\Model;

class HttpClientLog extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public $hidden = ['sequence'];
}