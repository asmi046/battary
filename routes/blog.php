<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\BlogController;


    Route::get('/wiki', [BlogController::class, "index"])->name('wiki');
    Route::get('/wiki/cat/{slug}', [BlogController::class, "wiki_cat"])->name('wiki_cat');
    Route::get('/wiki/{slug}', [BlogController::class, "wiki_page"])->name('wiki_page');

