<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Actions\CreateUserAction;
use Gamify\Http\Requests\UserCreateRequest;
use Gamify\Http\Requests\UserUpdateRequest;
use Gamify\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminUserController extends AdminController
{
    public function index(): View
    {
        return view('admin/user/index');
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function store(UserCreateRequest $request, CreateUserAction $createUserAction): RedirectResponse
    {
        $createUserAction->execute(
            $request->username(),
            $request->email(),
            $request->name(),
            password: Str::random(),
            role: $request->role(),
            skipEmailVerification: true
        );

        return redirect()->route('admin.users.index')
            ->with('success', __('admin/user/messages.create.success'));
    }

    public function show(User $user): View
    {
        return view('admin/user/show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin/user/edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        // users can't change its own role
        $data = Gate::denies('update-role', $user)
            ? Arr::except($request->validated(), 'role')
            : $request->validated();

        $user->update($data);

        return redirect()->route('admin.users.edit', $user)
            ->with('success', __('admin/user/messages.edit.success'));
    }

    public function destroy(User $user): RedirectResponse
    {
        if (Gate::denies('delete-user', $user)) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', __('admin/user/messages.delete.success'));
    }
}
