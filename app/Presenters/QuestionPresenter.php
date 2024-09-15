<?php


namespace Gamify\Presenters;

use Coderflex\LaravelPresenter\Presenter;
use Gamify\Models\Question;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class QuestionPresenter extends Presenter
{
    /** @var Question */
    protected $model;

    /**
     * Returns the question status as a badge.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     */
    public function statusBadge(): HtmlString
    {
        $badge = sprintf('<span class="label %s">%s</span>',
            $this->mapStatusToLabel($this->model->status),
            trans('admin/question/model.status_list.'.$this->model->status)
        );

        return Str::of($badge)
            ->toHtmlString();
    }

    /**
     * Map a Question status to a color label.
     *
     * @return string
     */
    protected function mapStatusToLabel(string $status, string $default = 'label-default')
    {
        $LabelToColorDict = [
            Question::DRAFT_STATUS => 'label-default',
            Question::PUBLISH_STATUS => 'label-success',
            Question::FUTURE_STATUS => 'label-info',
            Question::PENDING_STATUS => 'label-warning',
        ];

        return $LabelToColorDict[$status] ?? $default;
    }

    /**
     * Returns the question visibility as a badge.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     */
    public function visibilityBadge(): HtmlString
    {
        $badge = $this->model->hidden
            ? '<span class="label label-default">'.trans('admin/question/model.hidden_yes').'</span>'
            : '';

        return Str::of($badge)
            ->toHtmlString();
    }

    public function visibility(): string
    {
        return $this->model->hidden
            ? trans('admin/question/model.hidden_yes')
            : trans('admin/question/model.hidden_no');
    }

    /**
     * Returns the statement of the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     */
    public function statement(): HtmlString
    {
        return Str::of($this->model->question)
            ->toHtmlString();
    }

    /**
     * Returns the explanation of the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     */
    public function explanation(): HtmlString
    {
        return Str::of($this->model->solution)
            ->toHtmlString();
    }

    /**
     * Returns the public link to the question.
     * Note: It returns an HtmlString to be able to use `{{ }}` on blade.
     */
    public function publicUrlLink(): HtmlString
    {
        return Str::of(sprintf(
            '<a href="%s" target="_blank" class="text-muted" title="Preview"><i class="fa fa-link"></i></a>',
            route('questions.show', [
                'q_hash' => $this->model->hash,
                'slug' => $this->model->slug,
            ]),
        ))
            ->toHtmlString();
    }

    public function publicationDateDescription(): string
    {
        return match ($this->model->status) {
            Question::PUBLISH_STATUS => trans('admin/question/model.published_on',
                ['datetime' => $this->publicationDate()]),
            Question::FUTURE_STATUS => trans('admin/question/model.scheduled_for',
                ['datetime' => $this->publicationDate()]),
            default => trans('admin/question/model.published_not_yet'),
        };
    }

    public function publicationDate(): string
    {
        return empty($this->model->publication_date)
            ? ''
            : $this->model->publication_date->format('Y-m-d H:i');
    }

    public function creator(): string
    {
        return $this->model->creator->username ?? 'N/A';
    }

    public function updater(): string
    {
        return $this->model->updater->username ?? 'N/A';
    }

    public function tags(): HtmlString
    {
        return Str::of(collect($this->model->tagArrayNormalized)
            ->map(fn ($value) => '<span class="label label-primary">'.$value.'</span>')
            ->implode(' '))
            ->toHtmlString();
    }
}
