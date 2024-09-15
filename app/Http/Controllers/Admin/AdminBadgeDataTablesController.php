<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Enums\BadgeActuators;
use Gamify\Models\Badge;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class AdminBadgeDataTablesController extends AdminController
{
    public function __invoke(Datatables $dataTable): JsonResponse
    {
        $badges = Badge::select([
            'id',
            'name',
            'required_repetitions',
            'active',
            'actuators',
        ])->orderBy('name', 'ASC');

        return $dataTable->eloquent($badges)
            ->editColumn('name', function (Badge $badge) {
                return $badge->present()->nameWithStatusBadge;
            })
            ->addColumn('image', function (Badge $badge) {
                return $badge->present()->imageThumbnail;
            })
            ->editColumn('active', function (Badge $badge) {
                return $badge->present()->status;
            })
            ->editColumn('actuators', function (Badge $badge) {
                return $badge->actuators->description;
            })
            ->addColumn('tags', function (Badge $badge) {
                return BadgeActuators::canBeTagged($badge->actuators)
                    ? $badge->present()->tags()
                    : '';
            })
            ->addColumn('actions', function (Badge $badge) {
                return view('admin.partials.actions_dd')
                    ->with('model', 'badges')
                    ->with('id', $badge->id)
                    ->render();
            })
            ->rawColumns(['name', 'actions', 'image', 'tags'])
            ->removeColumn('id')
            ->toJson();
    }
}
