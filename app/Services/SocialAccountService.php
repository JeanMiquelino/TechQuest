<?php


namespace Gamify\Services;

use Exception;
use Gamify\Actions\CreateUserAction;
use Gamify\Enums\Roles;
use Gamify\Models\LinkedSocialAccount;
use Gamify\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ExternalUser;

class SocialAccountService
{
    /**
     * Returns the User object authenticated by a social login.
     * If the user doesn't exist, it will be created.
     */
    public function findOrCreate(ExternalUser $externalUser, string $provider): User
    {
        $account = LinkedSocialAccount::query()
            ->where('provider_name', $provider)
            ->where('provider_id', $externalUser->getId())
            ->first();

        if (is_null($account?->user)) {
            return $this->createSocialAccount($externalUser, $provider);
        }

        return $account->user;
    }

    /**
     * Creates a User with the data provided by the authentication provider
     *
     * @throws Exception
     */
    private function createSocialAccount(
        ExternalUser $providerUser,
        string $provider
    ): User {

        if (is_null($providerUser->getEmail())) {
            throw new Exception('The external user has not a valid email address');
        }

        /** @var User $user */
        $user = User::query()
            ->where('email', $providerUser->getEmail())
            ->firstOr(function () use ($providerUser) {
                $createUserAction = app()->make(CreateUserAction::class);
                $generator = app()->make(UsernameGeneratorService::class);

                $username = empty($providerUser->getNickname())
                    ? $generator->fromEmail($providerUser->getEmail())
                    : $generator->fromText($providerUser->getNickname());

                return $createUserAction->execute(
                    $username,
                    $providerUser->getEmail(),
                    $providerUser->getName() ?? 'User '.$username,
                    password: Str::random(),
                    role: Roles::Player,
                    skipEmailVerification: true
                );
            });

        $user->accounts()->updateOrCreate([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;
    }
}
