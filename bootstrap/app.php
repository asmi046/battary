<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('web')
                ->group(base_path('routes/asmi_all.php'));

            Route::middleware('web')
                ->group(base_path('routes/select.php'));

            Route::middleware('web')
                ->group(base_path('routes/blog.php'));

            Route::middleware('web')
                ->group(base_path('routes/product.php'));

            Route::middleware('web')
                ->group(base_path('routes/compare.php'));

            Route::middleware('web')
                ->group(base_path('routes/shop.php'));

            Route::middleware('web')
                ->group(base_path('routes/geo.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
