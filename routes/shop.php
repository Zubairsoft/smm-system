<?php

use App\Http\Controllers\Api\v1\Shops\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('sessions')
    ->prefix('sessions')
    ->controller(SessionController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->middleware('auth:sanctum');
    });
