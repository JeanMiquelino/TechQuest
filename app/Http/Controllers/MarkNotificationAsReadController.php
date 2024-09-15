<?php


namespace Gamify\Http\Controllers;

use Gamify\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MarkNotificationAsReadController extends Controller
{
    public function __invoke(Request $request): Response
    {
        /** @var User $user */
        $user = User::findOrFail(Auth::id());

        $user
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()
            ->noContent();
    }
}
