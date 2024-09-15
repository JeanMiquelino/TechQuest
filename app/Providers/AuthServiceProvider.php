<?php


namespace Gamify\Providers;

use Gamify\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * Policies are discovered automatically using the Policy Auto-Discovery.
     *
     * @see https://laravel.com/docs/9.x/authorization#policy-auto-discovery
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerGamifyAbilities();
    }

    /**
     * Register custom Gamify authorization abilities.
     */
    protected function registerGamifyAbilities(): void
    {
        Gate::define('access-dashboard', function (User $currentUser) {
            return $currentUser->isAdmin();
        });

        Gate::define('update-profile', function (User $currentUser, User $user) {
            return $currentUser->is($user);
        });

        Gate::define('update-password', function (User $currentUser, User $user) {
            return $currentUser->is($user);
        });

        // A user can not update its own role.
        Gate::define('update-role', function (User $currentUser, User $user) {
            return $currentUser->isAdmin()
                && $currentUser->isNot($user);
        });

        // A user can not delete itself.
        Gate::define('delete-user', function (User $currentUser, User $user) {
            return $currentUser->isAdmin()
                && $currentUser->isNot($user);
        });
    }
}
