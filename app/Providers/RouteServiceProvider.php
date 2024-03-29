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
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "apu" routes for the application.
     * These routes are typically stateless.
     * $return void
     */
    protected function mapApiRoutes(): void
    {
        // Route::any('/proxy/{url?}', [ProxyController::class, 'example_api'])->where('url', '.*');

        Route::middleware('api')
            ->prefix('oauth/v1')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     * $return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware(['web', 'isResepsionis', 'auth', 'verified', 'cors'])
            ->prefix('Resepsionis')
            ->namespace($this->namespace)
            ->group(base_path('routes/Resepsionis/ResepsionisRoute.php'));

        Route::middleware(['web'])
            ->prefix('Poli-Umum')
            ->namespace($this->namespace)
            ->group(base_path('routes/Poli/Umum/PoliUmumRoutes.php'));

        Route::middleware(['web'])
            ->prefix('Poli-Gigi')
            ->namespace($this->namespace)
            ->group(base_path('routes/Poli/Gigi/PoliGigiRoutes.php'));
    }
}
