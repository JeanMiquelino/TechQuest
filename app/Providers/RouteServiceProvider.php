<?php


namespace Gamify\Providers;

use Gamify\Models\Badge;
use Gamify\Models\Level;
use Gamify\Models\Question;
use Gamify\Models\User;
use Gamify\Services\HashIdService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
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
        $this
//            ->configureRateLimiting()
            ->registerBindings()
            ->mapRoutes();
    }

    protected function mapRoutes(): self
    {
        return $this
            ->mapAuthRoutes()
            ->mapApiRoutes()
            ->mapWebRoutes();
    }

    protected function mapWebRoutes(): self
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        return $this;
    }

    protected function mapApiRoutes(): self
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        return $this;
    }

    protected function mapAuthRoutes(): self
    {
        Route::prefix('auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));

        return $this;
    }

    protected function registerBindings(): self
    {
        Route::model('users', User::class);
        Route::model('badges', Badge::class);
        Route::model('levels', Level::class);
        Route::model('questions', Question::class);

        Route::bind('username', function (string $value) {
            return User::where('username', $value)->firstOrFail();
        });

        Route::bind('q_hash', function (string $value) {
            try {
                $hashIdService = app(HashIdService::class);

                $id = $hashIdService->decode($value);

                return Question::findOrFail($id);
            } catch (\Throwable) {
                abort(404);
            }
        });

        return $this;
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
