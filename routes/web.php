<?php
use AniketMagadum\HttpClientLogger\Http\Controllers\HomeController;
use AniketMagadum\HttpClientLogger\Models\HttpClientLog;

Route::group(['prefix' => 'http-logs'], function () {
    Route::get('/{view?}', [HomeController::class, 'index'])->where('view', '(.*)')->name('http-logs');
});

Route::group(['prefix' => 'http-client-logs'], function () {
    Route::get(
        "/",
        function () {

            return HttpClientLog::
                when(request()->has('batch'), function ($query) {
                        return $query->where('batch', request()->get('batch'));
                    })->get();
        }
    );
});