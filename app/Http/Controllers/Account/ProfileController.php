<?php


namespace Gamify\Http\Controllers\Account;

use Gamify\Actions\UpdateUserProfileAction;
use Gamify\Http\Controllers\Controller;
use Gamify\Http\Requests\ProfileUpdateRequest;
use Gamify\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        return redirect()
            ->route('profiles.show', ['username' => $user->username]);
    }

    public function edit(): View
    {
        /** @var User $user */
        $user = Auth::user();

        return view('account.profile.edit')
            ->with('user', $user);
    }

    public function update(ProfileUpdateRequest $request, UpdateUserProfileAction $updateUserProfileAction): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $updateUserProfileAction->execute($user, $request->validated());

        return redirect()->route('account.index')
            ->with('success', __('user/messages.settings_updated'));
    }
}
