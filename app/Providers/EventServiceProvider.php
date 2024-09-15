<?php


namespace Gamify\Providers;

use Gamify\Events\AvatarUploaded;
use Gamify\Events\PointCreated;
use Gamify\Events\PointDeleted;
use Gamify\Events\ProfileUpdated;
use Gamify\Events\QuestionAnswered;
use Gamify\Events\SocialLogin;
use Gamify\Listeners\AddBadgesOnAvatarUploaded;
use Gamify\Listeners\AddBadgesOnProfileUpdated;
use Gamify\Listeners\AddBadgesOnQuestionAnswered;
use Gamify\Listeners\AddBadgesOnUserLoggedIn;
use Gamify\Listeners\AddReputation;
use Gamify\Listeners\UpdateCachedUserExperience;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Okta\OktaExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            OktaExtendSocialite::class,
        ],
        Login::class => [
            AddBadgesOnUserLoggedIn::class,
        ],
        QuestionAnswered::class => [
            AddReputation::class,
            AddBadgesOnQuestionAnswered::class,
        ],
        PointCreated::class => [
            UpdateCachedUserExperience::class,
        ],
        PointDeleted::class => [
            UpdateCachedUserExperience::class,
        ],
        SocialLogin::class => [
            AddBadgesOnUserLoggedIn::class,
        ],
        AvatarUploaded::class => [
            AddBadgesOnAvatarUploaded::class,
        ],
        ProfileUpdated::class => [
            AddBadgesOnProfileUpdated::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
