<?php

namespace AniketMagadum\HttpClientLogger\Listeners;

use AniketMagadum\HttpClientLogger\Models\HttpClientLog;

class LogResponseReceived
{
    public function handle($event)
    {
        HttpClientLog::create([
            'uuid' => (string) str()->uuid(),
            'url' => $event->request->url(),
            'method' => $event->request->method(),
            'request_body' => $event->request->body(),
            'response_body' => $event->response->body(),
            'request_headers' => convert_array_to_key_value_header_format($event->request->headers()),
            'response_headers' => convert_array_to_key_value_header_format($event->response->headers()),
            'status_code' => $event->response->status(),
            'response_time' => $event->response->transferStats->getHandlerStats()['total_time']
        ]);
    }
}