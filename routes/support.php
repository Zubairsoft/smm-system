<?php

use App\Http\Controllers\Api\v1\Supports\lists\ListBankController;
use Illuminate\Support\Facades\Route;


Route::prefix('lists')
    ->group(function () {
        Route::get('banks', ListBankController::class);
    });
