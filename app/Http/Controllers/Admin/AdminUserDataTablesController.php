<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Models\User;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class AdminUserDataTablesController extends AdminController
{
    public function __invoke(Datatables $dataTable): JsonResponse
    {
        $users = User::select([
            'id',
            'name',
            'username',
            'email',
            'role',
        ])->orderBy('username', 'ASC');

        return $dataTable->eloquent($users)
            ->editColumn('role', function (User $user) {
                return $user->present()->role;
            })
            ->addColumn('experience', function (User $user) {
                return $user->experience;
            })
            ->addColumn('level', function (User $user) {
                return $user->present()->level;
            })
            ->addColumn('actions', function (User $user) {
                return view('admin/partials.actions_dd')
                    ->with('model', 'users')
                    ->with('id', $user->id)
                    ->render();
            })
            ->rawColumns(['actions'])
            ->removeColumn('id')
            ->toJson();
    }
}
