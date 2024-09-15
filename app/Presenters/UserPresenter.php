<?php


namespace Gamify\Presenters;

use Coderflex\LaravelPresenter\Presenter;
use Gamify\Models\User;
use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
    /** @var User */
    protected $model;

    public function role(): string
    {
        return $this->model->role->description
            ?? '';
    }

    public function createdAt(): string
    {
        return $this->model->created_at?->toFormattedDateString()
            ?? '';
    }

    public function birthdate(): string
    {
        return $this->model->profile->date_of_birth?->toFormattedDateString()
            ?? '';
    }

    public function bio(): string
    {
        return $this->model->profile->bio
            ?? '';
    }

    public function adminLabel(): HtmlString
    {
        return new HtmlString($this->model->isAdmin()
            ? '<span class="label label-warning">'.$this->role().'</span>'
            : ''
        );
    }
}
