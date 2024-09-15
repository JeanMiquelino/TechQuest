<?php


namespace Gamify\Http\Controllers\Auth;

use Gamify\Events\SocialLogin;
use Gamify\Http\Controllers\Controller;
use Gamify\Providers\RouteServiceProvider;
use Gamify\Services\SocialAccountService;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     */
    public function redirectToProvider(string $provider): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information.
     */
    public function handleProviderCallback(SocialAccountService $accountRepository, string $provider): RedirectResponse
    {
        $externalUser = Socialite::driver($provider)->user();

        $user = $accountRepository->findOrCreate($externalUser, $provider);

        auth()->login($user, false);

        SocialLogin::dispatch($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
