<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SelectionController;

    Route::get('/select_product', [SelectionController::class, "select_product"])->name('select_product');
    Route::get('/selection_filter/{group?}', [SelectionController::class, "selection_filter"])->name('selection_filter');

    Route::get('/select_by_car', [SelectionController::class, "select_by_car"])->name('select_by_car');
    Route::get('/select_by_params', [SelectionController::class, "select_by_params"])->name('select_by_params');
