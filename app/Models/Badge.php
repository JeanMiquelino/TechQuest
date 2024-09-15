<?php


namespace Gamify\Models;

use BenSampo\Enum\Traits\QueriesFlaggedEnums;
use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
use Cviebrock\EloquentTaggable\Taggable;
use Gamify\Enums\BadgeActuators;
use Gamify\Presenters\BadgePresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Model that represents a badge.
 *
 * @property int $id Object unique id.
 * @property string $name Name of this badge.
 * @property string $description Description of the badge.
 * @property int $required_repetitions How many times you need to request the badge to achieve it.
 * @property string $image URL of the badge's image
 * @property bool $active Is this badge enabled?
 * @property BadgeActuators $actuators Events that triggers this badge completion.
 */
class Badge extends Model implements HasMedia, CanPresent
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;
    use QueriesFlaggedEnums;
    use Taggable;
    use UsesPresenters;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile()
            ->useFallbackUrl('/images/missing_badge.png')
            ->useFallbackPath(public_path('/images/missing_badge.png'))
            ->registerMediaConversions(function () {
                $this
                    ->addMediaConversion('thumb')
                    ->width(150)
                    ->height(150);

                $this
                    ->addMediaConversion('detail')
                    ->width(300)
                    ->height(300);
            });
    }

    protected array $presenters = [
        'default' => BadgePresenter::class,
    ];

    protected $fillable = [
        'name',
        'description',
        'required_repetitions',
        'active',
        'actuators',
    ];

    protected $casts = [
        'active' => 'boolean',
        'actuators' => BadgeActuators::class,
    ];

    public static function triggeredByQuestionsWithTagsIn(array $tags): Collection
    {
        return self::query()
            ->active()
            ->hasAnyFlags('actuators', BadgeActuators::triggeredByQuestions())
            ->when($tags, function ($query) use ($tags) {
                $query->withAnyTags($tags);
            }, function ($query) {
                $query->isNotTagged();
            })
            ->get();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeWithActuatorsIn(Builder $query, array $actuators): Builder
    {
        /** @phpstan-ignore-next-line */
        return $query
            ->active()
            ->hasAnyFlags('actuators', $actuators);
    }

    public function slug(): string
    {
        return Str::slug($this->name);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getFirstMediaUrl('image', 'detail')
        );
    }
}
