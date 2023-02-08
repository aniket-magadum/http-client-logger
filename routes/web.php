<?php
use AniketMagadum\HttpClientLogger\Http\Controllers\HomeController;

Route::group(['prefix' => 'http-logs'], function () {

    Route::get('/{view?}', [HomeController::class,'index'])->where('view', '(.*)')->name('http-logs');
});