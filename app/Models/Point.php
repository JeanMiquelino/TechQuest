<?php


namespace Gamify\Models;

use Gamify\Events\PointCreated;
use Gamify\Events\PointDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Point.
 *
 *
 * @property int $id Object unique id..
 * @property int $points How many points has been given.
 * @property string $description Reason to obtain the points.
 * @property-read User $user
 */
class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'points',
        'description',
    ];

    protected $dispatchesEvents = [
        'created' => PointCreated::class,
        'deleted' => PointDeleted::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
