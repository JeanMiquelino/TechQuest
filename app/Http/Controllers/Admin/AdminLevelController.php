<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Http\Requests\LevelCreateRequest;
use Gamify\Http\Requests\LevelUpdateRequest;
use Gamify\Models\Level;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminLevelController extends AdminController
{
    public function index(): View
    {
        return view('admin.level.index');
    }

    public function store(LevelCreateRequest $request): RedirectResponse
    {
        $level = Level::create($request->validated());

        if ($request->has('image')) {
            $level->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('admin.levels.index')
            ->with('success', __('admin/level/messages.create.success'));
    }

    public function create(): View
    {
        return view('admin.level.create');
    }

    public function show(Level $level): View
    {
        return view('admin.level.show', compact('level'));
    }

    public function edit(Level $level): View
    {
        return view('admin.level.edit', compact('level'));
    }

    public function update(LevelUpdateRequest $request, Level $level): RedirectResponse
    {
        $level->update($request->validated());

        if ($request->has('image')) {
            $level->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('admin.levels.index')
            ->with('success', __('admin/level/messages.update.success'));
    }

    public function destroy(Level $level): RedirectResponse
    {
        $level->delete();

        return redirect()->route('admin.levels.index')
            ->with('success', __('admin/level/messages.delete.success'));
    }
}
