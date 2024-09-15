<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Models\Question;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class AdminQuestionDataTablesController extends AdminController
{
    public function __invoke(Datatables $dataTable): JsonResponse
    {
        $questions = Question::select([
            'id',
            'name',
            'status',
            'hidden',
            'publication_date',
        ])->orderBy('name', 'ASC');

        return $dataTable->eloquent($questions)
            ->editColumn('status', function (Question $question) {
                return $question->present()->statusBadge().' '.$question->present()->visibilityBadge();
            })
            ->editColumn('name', function (Question $question) {
                return $question->name.' '.$question->present()->publicUrlLink();
            })
            ->editColumn('publication_date', function (Question $question) {
                return $question->present()->publicationDate();
            })
            ->addColumn('tags', function (Question $question) {
                return $question->present()->tags();
            })
            ->addColumn('actions', function (Question $question) {
                return view('admin/partials.actions_dd')
                    ->with('model', 'questions')
                    ->with('id', $question->id)
                    ->render();
            })
            ->rawColumns(['actions', 'status', 'name', 'tags'])
            ->removeColumn(['id', 'hidden'])
            ->toJson();
    }
}
