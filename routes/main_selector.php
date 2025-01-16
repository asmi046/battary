<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\MainSelectorController;

    Route::get('/get_all_car_icon', [MainSelectorController::class, "get_all_car_icon"])->name('get_all_car_icon');
    Route::get('/get_all_akb_size', [MainSelectorController::class, "get_all_akb_size"])->name('get_all_akb_size');
    Route::get('/get_marka_by_char/{char}', [MainSelectorController::class, "get_marka_by_char"])->name('get_marka_by_char');

