<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SelectionController;

    Route::get('/selection_filter/{group?}', [SelectionController::class, "selection_filter"])->name('selection_filter');
    Route::get('/get_ts_types', [SelectionController::class, "get_ts_types"])->name('get_ts_types');
    Route::get('/get_ts_brands', [SelectionController::class, "get_ts_brands"])->name('get_ts_brands');
    Route::get('/get_ts_models', [SelectionController::class, "get_ts_models"])->name('get_ts_models');
    Route::get('/select_by_car', [SelectionController::class, "select_by_car"])->name('select_by_car');
    Route::get('/select_by_params', [SelectionController::class, "select_by_params"])->name('select_by_params');
