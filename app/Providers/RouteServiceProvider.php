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
     * Application er "home" route er path.
     *
     * Ei path e user ke authentication er por redirect kora hoy.
     *
     * @var string
     */
    public const HOME = '/'; // Home route jekhane user ke redirect kora hobe

    /**
     * Route model bindings, pattern filters, and onno route configuration define kora.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting(); // Rate limiting setup kora hoy

        // Route gulo define kora hoy
        $this->routes(function () {
            // API routes er jonno 'api' middleware use kora hobe, and 'api' prefix thakbe
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Web routes er jonno 'web' middleware use kora hobe
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Application er rate limiters configure kora.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // API request er rate limit set kora
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60) // 1 minute e 60 ta request allowed
                ->by($request->user()?->id ?: $request->ip()); // User id ba IP address er maddhome unique rate limit set kora
        });
    }
}
