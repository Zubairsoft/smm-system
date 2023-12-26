<?php

use App\Http\Controllers\Api\v1\Supports\lists\ListBankController;
use App\Http\Controllers\Api\v1\Supports\lists\ListBrandController;
use App\Http\Controllers\Api\v1\Supports\lists\ListCategoryController;
use App\Http\Controllers\Api\v1\Supports\lists\ListProductAttributeController;
use App\Http\Controllers\Api\v1\Supports\lists\ListProductAttributeDetailController;
use Illuminate\Support\Facades\Route;


Route::prefix('lists')
    ->group(function () {
        Route::get('banks', ListBankController::class);
        Route::get('brands', ListBrandController::class);
        Route::get('categories', ListCategoryController::class);
        Route::get('product_attributes', ListProductAttributeController::class);
        Route::get('product_attributes/{id}/product_attribute_details', ListProductAttributeDetailController::class);
    });
