<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Http\Middleware\HandleCors; // Thêm dòng này

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->group('api', [
        //     EnsureFrontendRequestsAreStateful::class, // Sanctum Middleware
        //     HandleCors::class, // Middleware xử lý CORS
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
