<?php


namespace Gamify\Http\View\Composers;

use Gamify\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserHeaderComposer
{
    public function compose(View $view): void
    {
        $user = User::with([
            'profile',
        ])->find(
            Auth::id(),
            ['id', 'name', 'username', 'created_at']
        );

        $view->with('user', $user);
    }
}
