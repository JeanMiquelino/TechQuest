<?php


namespace Gamify\Presenters;

use Coderflex\LaravelPresenter\Presenter;
use Gamify\Models\Level;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class LevelPresenter extends Presenter
{
    /** @var Level */
    protected $model;

    public function imageThumbnail(): HtmlString
    {
        $imageTag = sprintf('<img class="img-thumbnail" src="%s" alt="%s" title="%s">',
            $this->model->getFirstMediaUrl('image', 'thumb'),
            $this->model->name,
            $this->model->name);

        return Str::of($imageTag)
            ->toHtmlString();
    }

    public function imageTag(): HtmlString
    {
        $imageTag = sprintf('<img src="%s" alt="%s" title="%s">',
            $this->model->getFirstMediaUrl('image', 'detail'),
            $this->model->name,
            $this->model->name);

        return Str::of($imageTag)
            ->toHtmlString();
    }

    public function status(): string
    {
        return ($this->model->active)
            ? trans('general.yes')
            : trans('general.no');
    }

    public function nameWithStatusBadge(): HtmlString
    {
        $badge = $this->model->active
            ? $this->model->name
            : $this->model->name.' '.$this->statusBadge();

        return Str::of($badge)
            ->toHtmlString();
    }

    public function statusBadge(): HtmlString
    {
        $badge = $this->model->active
            ? ''
            : '<span class="label label-default">'.trans('general.disabled').'</span>';

        return Str::of($badge)
            ->toHtmlString();
    }
}
