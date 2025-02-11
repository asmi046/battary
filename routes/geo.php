<?php

use App\Http\Controllers\GeoController;
use Illuminate\Support\Facades\Route;

Route::get('/get_geo_data', [GeoController::class, "get_geo_data"])->name('get_geo_data');
Route::get('/get_region_list', [GeoController::class, "get_region_list"])->name('get_region_list');
