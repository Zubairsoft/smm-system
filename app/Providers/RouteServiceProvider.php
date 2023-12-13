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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            $this->apiRouteMap();
            $this->dashboardRouteMap();
            $this->shopRouteMap();
            $this->supportsRouteMap();
            $this->webRouteMap();
        });
    }

    private function apiRouteMap()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    private function dashboardRouteMap()
    {
        Route::middleware('api')
            ->name('dashboard')
            ->prefix('api/v1/dashboard/')
            ->group(base_path('routes/dashboard.php'));
    }

    private function shopRouteMap()
    {
        Route::middleware('api')
            ->name('shops.')
            ->prefix('api/v1/shops/')
            ->group(base_path('routes/shop.php'));
    }

    private function supportsRouteMap()
    {
        Route::middleware('api')
            ->name('supports.')
            ->prefix('api/v1/supports/')
            ->group(base_path('routes/support.php'));
    }

    private function webRouteMap()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
