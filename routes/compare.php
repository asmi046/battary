<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\CompareController;

    Route::get('/compare', [CompareController::class, "index"])->name('compare');

