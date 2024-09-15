<?php


namespace Gamify\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class QuestionChoice.
 *
 * @property string $text The text of this choice.
 * @property int $score How many points are added by this choice.
 *
 * @mixin \Eloquent
 *
 * @property-read \Gamify\Models\Question $question
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Gamify\Models\QuestionChoice correct()
 */
class QuestionChoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'text',
        'score',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    protected $touches = ['question'];

    public function isCorrect(): bool
    {
        return $this->score > 0;
    }

    public function scopeCorrect(Builder $query): Builder
    {
        return $query->where('score', '>', '0');
    }

    public function scopeIncorrect(Builder $query): Builder
    {
        return $query->where('score', '<=', '0');
    }
}
