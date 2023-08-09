<?php

use Illuminate\Support\Facades\Route;

# VUE APP

    Route::get('{any?}', '\App\Http\Controllers\AppController@app')
        ->where('any', '^(?!api).*$')
        ->name('app');

    Route::domain('{subdomain}.' . env('SESSION_DOMAIN'))->group(function () {

        Route::get('{any?}', '\App\Http\Controllers\AppController@app')
            ->where('any', '^(?!api).*$')
            ->name('subdomain.app');

    });