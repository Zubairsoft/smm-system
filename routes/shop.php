<?php

use App\Http\Controllers\Api\v1\Shops\BankAccountController;
use App\Http\Controllers\Api\v1\Shops\CouponController;
use App\Http\Controllers\Api\v1\Shops\ProductController;
use App\Http\Controllers\Api\v1\Shops\ProfileController;
use App\Http\Controllers\Api\v1\Shops\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('sessions')
    ->prefix('sessions')
    ->controller(SessionController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->middleware('auth:shop-api');

        Route::prefix('activate-emails')->group(function () {
            Route::post('resend-verification-code', 'resendEmailVerificationCode');
            Route::patch('/', 'activateEmail');
        });

        Route::prefix('activate-phones')->group(function () {
            Route::post('resend-verification-code', 'resendPhoneVerificationCode');
            Route::patch('/', 'activatePhone');
        });
    });

Route::middleware('auth:shop-api')->group(function () {

    Route::prefix('profile')
        ->controller(ProfileController::class)
        ->group(function () {
            Route::get('/', 'show');
            Route::patch('/', 'update');
        });

    Route::prefix('bank-accounts')
        ->controller(BankAccountController::class)
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::patch('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        });

    Route::prefix('products')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::patch('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        });


    Route::prefix('coupons')
        ->controller(CouponController::class)
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::patch('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        });
});
