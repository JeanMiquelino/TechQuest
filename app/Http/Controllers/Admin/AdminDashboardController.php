<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Models\Badge;
use Gamify\Models\Level;
use Gamify\Models\Question;
use Gamify\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends AdminController
{
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'badges_count' => Badge::active()->count(),
            'questions_count' => Question::published()->count(),
            'players_count' => User::player()->count(),
            'levels_count' => Level::active()->count(),
            'latest_users' => User::orderBy('created_at', 'desc')->take(5)->get(),
            'latest_questions' => Question::published()->orderBy('publication_date', 'desc')->take(5)->get(),
            'next_scheduled_questions' => Question::scheduled()->orderBy('publication_date', 'asc')->take(5)->get(),
        ]);
    }
}
