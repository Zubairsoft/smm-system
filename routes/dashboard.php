<?php

use App\Http\Controllers\Api\v1\Dashboard\BankAccountController;
use App\Http\Controllers\Api\v1\Dashboard\BankController;
use App\Http\Controllers\Api\v1\Dashboard\BrandController;
use App\Http\Controllers\Api\v1\Dashboard\CategoryController;
use App\Http\Controllers\Api\v1\Dashboard\DeliveryWorkerController;
use App\Http\Controllers\Api\v1\Dashboard\ProductAttributeController;
use App\Http\Controllers\Api\v1\Dashboard\ProductAttributeDetailController;
use App\Http\Controllers\Api\v1\Dashboard\PromotionalOfferController;
use App\Http\Controllers\Api\v1\Dashboard\SessionController;
use App\Http\Controllers\Api\v1\Dashboard\Settings\PromotionalOfferSettingController;
use App\Http\Controllers\Api\v1\Dashboard\ShopController;
use App\Http\Controllers\Api\v1\Dashboard\TagController;
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

                Route::name('bank-accounts.')
                    ->prefix('{id}/bank-accounts')
                    ->controller(BankAccountController::class)->group(function () {
                        Route::get('/', 'index');
                        Route::post('/', 'store');
                        Route::get('/{bankAccountId}', 'show');
                        Route::patch('/{bankAccountId}', 'update');
                        Route::delete('/{bankAccountId}', 'destroy');
                    });
            });

        Route::name('banks')
            ->prefix('banks')
            ->controller(BankController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('categories.')
            ->prefix('categories')
            ->controller(CategoryController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('brands.')
            ->prefix('brands')
            ->controller(BrandController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('tags.')
            ->prefix('tags')
            ->controller(TagController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('product-attributes.')
            ->prefix('product-attributes')
            ->controller(ProductAttributeController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');

                Route::name('product-attribute-details.')
                    ->prefix('{id}/product-attributes-details')
                    ->controller(ProductAttributeDetailController::class)->group(function () {
                        Route::get('/', 'index');
                        Route::post('/', 'store');
                        Route::get('/{productAttributeDetailId}', 'show');
                        Route::patch('/{productAttributeDetailId}', 'update');
                        Route::delete('/{productAttributeDetailId}', 'destroy');
                    });
            });

        Route::name('delivery-workers.')
            ->prefix('delivery-workers')
            ->controller(DeliveryWorkerController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('promotional-offers')
            ->prefix('promotional-offers')
            ->controller(PromotionalOfferController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/{id}', 'show');
                Route::patch('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::name('settings.')
            ->prefix('settings')
            ->group(function () {
                Route::name('promotional-offers')
                    ->prefix('promotional-offers')
                    ->controller(PromotionalOfferSettingController::class)->group(function () {
                        Route::get('/', 'show');
                        Route::patch('/', 'update');
                    });
            });
    });
