<?php


namespace Gamify\Http\Controllers;

use Gamify\Libs\Game\Game;
use Gamify\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    const MAX_QUESTIONS_SHOWN = 5;

    public function __invoke(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $questions = $user->pendingQuestions(self::MAX_QUESTIONS_SHOWN);

        return view('home.index')
            ->with('questions', $questions)
            ->with('usersInRanking', Game::getTopExperiencedPlayers());
    }
}
