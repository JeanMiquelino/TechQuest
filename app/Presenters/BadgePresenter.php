<?php


namespace Gamify\Presenters;

use Coderflex\LaravelPresenter\Presenter;
use Gamify\Models\Badge;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class BadgePresenter extends Presenter
{
    /** @var Badge */
    protected $model;

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

    public function imageThumbnail(): HtmlString
    {
        $imageTag = sprintf('<img class="img-thumbnail" src="%s" alt="%s" title="%s">',
            $this->model->getFirstMediaUrl('image', 'thumb'),
            $this->model->description,
            $this->model->name);

        return Str::of($imageTag)
            ->toHtmlString();
    }

    public function imageTag(): HtmlString
    {
        $imageTag = sprintf('<imgsrc="%s" alt="%s" title="%s">',
            $this->model->getFirstMediaUrl('image', 'detail'),
            $this->model->description,
            $this->model->name);

        return Str::of($imageTag)
            ->toHtmlString();
    }

    public function actuators(): array
    {
        return $this->model->actuators->getFlags();
    }

    public function unlockedAt(): string
    {
        /** @phpstan-ignore-next-line */
        return $this->model->progress->completed_at?->toFormattedDateString()
            ?? '';
    }

    public function tags(): HtmlString
    {
        return Str::of(collect($this->model->tagArrayNormalized)
            ->map(fn ($value) => '<span class="label label-primary">'.$value.'</span>')
            ->implode(' '))
            ->toHtmlString();
    }

    public function tagsIn(array $tags): HtmlString
    {
        return Str::of(collect($this->model->tagArrayNormalized)->intersect($tags)
            ->map(fn ($value) => '<span class="label label-default">'.$value.'</span>')
            ->implode(' '))
            ->toHtmlString();
    }
}
