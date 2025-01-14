<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;


    Route::get('/compare', [FavoriteController::class, "index"])->name("compare");
    Route::get('/favorites/get', [FavoriteController::class, "get_all"])->name("favorites_get");
    Route::post('/favorites/add', [FavoriteController::class, "add"])->name("favorites_add");
    Route::delete('/favorites/delete', [FavoriteController::class, "delete"])->name("favorites_delete");
    Route::delete('/favorites/clear', [FavoriteController::class, "clear"])->name("favorites_clear");

