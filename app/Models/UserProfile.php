<?php


namespace Gamify\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Role model, represents a role.
 *
 * @property int $id The object unique id.
 * @property string $bio Short bio information.
 * @property string $avatarUrl URL of the avatar.
 * @property ?Carbon $date_of_birth Date of Birth.
 * @property string $twitter Twitter username
 * @property string $facebook Facebook username
 * @property string $linkedin LinkedIn username
 * @property string $github GitHub username
 * @property User $user User wo belongs to.
 */
class UserProfile extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl('/images/missing_profile.png')
            ->useFallbackPath(public_path('/images/missing_profile.png'))
            ->registerMediaConversions(function () {
                $this
                    ->addMediaConversion('thumb')
                    ->width(150)
                    ->height(150);
            });
    }

    protected $fillable = [
        'bio',
        'date_of_birth',
        'twitter',
        'facebook',
        'linkedin',
        'github',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getFirstMediaUrl('avatar', 'thumb')
        );
    }
}
