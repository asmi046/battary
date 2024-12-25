<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\ProductController;


    Route::get('/product', [ProductController::class, "index"])->name('product');
    Route::get('/product/cat/{slug}', [ProductController::class, "product_cat"])->name('product_cat');
    Route::get('/product/{slug}', [ProductController::class, "product_page"])->name('product_page');

