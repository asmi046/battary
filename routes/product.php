<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\ProductController;


    Route::get('/search', [ProductController::class, "search"])->name('search');
    Route::get('/catalog', [ProductController::class, "index"])->name('catalog');
    Route::get('/catalog/product/cat/{slug}', [ProductController::class, "product_cat"])->name('product_cat');
    Route::get('/catalog/product/{slug}', [ProductController::class, "product_page"])->name('product_page');

