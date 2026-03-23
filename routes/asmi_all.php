<?php
    use Illuminate\Support\Facades\Route;
    use MoonShine\Http\Middleware\Authenticate;

    use App\Http\Controllers\BannerController;
    use App\Http\Controllers\ImportController;
    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\Page\PageController;


    Route::get('/', [IndexController::class, "index"])->name('home');

    Route::get('/get_all_banners', [BannerController::class, "get_all_banners"])->name('get_all_banners');

    Route::get('/about', [IndexController::class, "about"])->name('about');
    Route::get('/contacts', [IndexController::class, "contacts"])->name('contacts');
    Route::get('/import', [ImportController::class, 'index'])
        ->middleware(Authenticate::class)
        ->name('import');
    Route::post('/import', [ImportController::class, 'store'])
        ->middleware(Authenticate::class)
        ->name('import.store');

    Route::get('/page/{slug}', [PageController::class, "index"])->name('page');
