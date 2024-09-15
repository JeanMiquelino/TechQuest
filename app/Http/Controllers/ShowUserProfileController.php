<?php


namespace Gamify\Http\Controllers;

use Gamify\Models\User;
use Illuminate\View\View;

class ShowUserProfileController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('profile.show')
            ->with('user', $user);
    }
}
