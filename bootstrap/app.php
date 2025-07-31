<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /**
         * ---- GLOBAL MIDDLEWARE ----
         */
        $middleware->append([
            \Illuminate\Http\Middleware\HandleCors::class,
            \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);

        /**
         * ---- WEB MIDDLEWARE GRUBU ----
         */
        $middleware->group('web', [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'throttle:120,1',
        ]);

        /**
         * ---- API MIDDLEWARE GRUBU ----
         */
        $middleware->group('api', [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        /**
         * ---- MIDDLEWARE ALIASLARI ----
         * Route seviyesinde kullanacağımız kısa adlar
         */
        $middleware->alias([
            'auth'       => \App\Http\Middleware\Authenticate::class,
            'guest'      => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'verified'   => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
            'signed'     => \Illuminate\Routing\Middleware\ValidateSignature::class,
            'can'        => \Illuminate\Auth\Middleware\Authorize::class,
            'throttle'   => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
            'administration' => \App\Http\Middleware\Administration::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
