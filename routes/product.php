<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\BlogController;


    Route::get('/product', [BlogController::class, "index"])->name('product');
    Route::get('/product/cat/{slug}', [BlogController::class, "product_cat"])->name('product_cat');
    Route::get('/product/{slug}', [BlogController::class, "product_page"])->name('product_page');

