<?php

use App\Http\Controllers\Api\v1\Dashboard\SessionController;
use App\Http\Controllers\Api\v1\Dashboard\ShopController;
use Illuminate\Support\Facades\Route;

Route::name('session.')
    ->prefix('sessions')
    ->controller(SessionController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout')->middleware('auth:admin-api');
    });

Route::middleware('auth:admin-api')
    ->group(function () {
        
        Route::name('shops.')
            ->prefix('shops')
            ->controller(ShopController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });
    });
