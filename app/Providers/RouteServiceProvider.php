<?php

namespace App\Providers;

use App\Models\Product;
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
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        // register the rate limiter then applay it at the route 
        RateLimiter::for('watch_limiter', function (Request $request) {
            return Limit::perMinute(3);
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Route::middleware('web')
            //     ->prefix('admins')
            //     ->group(base_path('routes/web.php'));

            // Route::middleware('web')
                // ->prefix('merchants')
            //     ->group(base_path('routes/web.php'));
        });
        // Route::pattern('id','[0-9]+'); example for global route constraint every parameter named id will get this constraint
        
        // to avoid the 404 erorr for the manual slug
        // Route::bind('product', function (string $value) {
        //     return Product::where('name', str_replace('-',' ', $value))->firstOrFail();
        // });
    }
}
