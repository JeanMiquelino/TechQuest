<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Models\Level;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class AdminLevelDataTablesController extends AdminController
{
    public function __invoke(Datatables $dataTable): JsonResponse
    {
        $levels = Level::query()
            ->select([
                'id',
                'name',
                'required_points',
                'active',
            ])
            ->orderBy('required_points', 'ASC');

        return $dataTable->eloquent($levels)
            ->editColumn('name', function (Level $level) {
                return $level->present()->nameWithStatusBadge;
            })
            ->addColumn('image', function (Level $level) {
                return $level->present()->imageThumbnail();
            })
            ->editColumn('active', function (Level $level) {
                return $level->present()->status;
            })
            ->addColumn('actions', function (Level $level) {
                return view('admin/partials.actions_dd')
                    ->with('model', 'levels')
                    ->with('id', $level->id)
                    ->render();
            })
            ->rawColumns(['name', 'actions', 'image'])
            ->removeColumn('id')
            ->toJson();
    }
}
