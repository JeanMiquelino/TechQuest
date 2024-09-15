<?php


namespace Gamify\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkedSocialAccount extends Model
{
    protected $fillable = [
        'provider_name',
        'provider_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
