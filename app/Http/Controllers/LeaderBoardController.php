<?php


namespace Gamify\Http\Controllers;

use Gamify\Libs\Game\Game;
use Illuminate\View\View;

class LeaderBoardController extends Controller
{
    public function __invoke(): View
    {
        return view('leaderboard.index')
            ->with('usersInRanking', Game::getTopExperiencedPlayers());
    }
}
