<?php

use App\Http\Controllers\Api\v1\Dashboard\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('session.')
    ->prefix('sessions')
    ->controller(SessionController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout');
    });
