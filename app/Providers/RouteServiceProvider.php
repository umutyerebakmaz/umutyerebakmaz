<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Login sonrası yönlendirme.
     */
    public const HOME = '/dashboard';

    /**
     * Route gruplarını burada tanımlıyoruz.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));


            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // Örnek global pattern (id parametresi sadece sayısal olabilir)
        Route::pattern('id', '[0-9]+');
    }

    /**
     * API rate limiting.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(100)->by(optional($request->user())->id ?: $request->ip());
        });


        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip()); // 1 dk içinde 5 deneme
        });
    }
}
