<?php


namespace Gamify\Providers;

use Gamify\Http\View\Composers\UserHeaderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
            ['partials.user_dropdown'],
            UserHeaderComposer::class
        );
    }
}
