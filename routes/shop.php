<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

    Route::get('/shops', [ShopController::class, "index"])->name('shops');
    Route::get('/get_shops', [ShopController::class, "get_shops"])->name('get_shops');
