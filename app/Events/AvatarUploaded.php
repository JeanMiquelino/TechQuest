<?php


namespace Gamify\Events;

use Gamify\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class AvatarUploaded
{
    use Dispatchable;

    public function __construct(
        public User $user
    )
    {
        //
    }
}
