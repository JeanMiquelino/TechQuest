<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Http\Requests\BadgeCreateRequest;
use Gamify\Http\Requests\BadgeUpdateRequest;
use Gamify\Models\Badge;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminBadgeController extends AdminController
{
    public function index(): View
    {
        return view('admin.badge.index');
    }

    public function store(BadgeCreateRequest $request): RedirectResponse
    {
        $badge = Badge::create([
            'name' => $request->name(),
            'description' => $request->description(),
            'required_repetitions' => $request->repetitions(),
            'active' => $request->active(),
            'actuators' => $request->actuators(),
        ]);

        $badge->tag($request->tags());

        if ($request->has('image')) {
            $badge->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.create.success'));
    }

    public function create(): View
    {
        return view('admin.badge.create');
    }

    public function show(Badge $badge): View
    {
        return view('admin.badge.show')
            ->with('badge', $badge);
    }

    public function edit(Badge $badge): View
    {
        return view('admin.badge.edit')
            ->with('badge', $badge);
    }

    public function update(BadgeUpdateRequest $request, Badge $badge): RedirectResponse
    {
        $badge->update([
            'name' => $request->name(),
            'description' => $request->description(),
            'required_repetitions' => $request->repetitions(),
            'active' => $request->active(),
            'actuators' => $request->actuators(),
        ]);

        $badge->retag($request->tags());

        if ($request->has('image')) {
            $badge->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.update.success'));
    }

    public function destroy(Badge $badge): RedirectResponse
    {
        $badge->delete();

        return redirect()->route('admin.badges.index')
            ->with('success', __('admin/badge/messages.delete.success'));
    }
}
