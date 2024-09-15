<?php


namespace Gamify\Events;

use Gamify\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class ProfileUpdated
{
    use Dispatchable;

    public function __construct(
        public User $user
    )
    {
        //
    }
}
