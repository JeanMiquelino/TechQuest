<?php


namespace Gamify\Http\Controllers\Account;

use Gamify\Actions\UpdatePasswordAction;
use Gamify\Http\Controllers\Controller;
use Gamify\Http\Requests\UpdatePasswordRequest;
use Gamify\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChangePasswordController extends Controller
{
    public function index(): View
    {
        return view('account.password.index');
    }

    public function update(UpdatePasswordRequest $request, UpdatePasswordAction $updatePasswordAction): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $updatePasswordAction->execute($user, $request->newPassword());

        return redirect()->action([static::class, 'index'])
            ->with('success', __('passwords.changed'));
    }
}
