<?php


namespace Gamify\Events;

use Gamify\Models\Point;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PointDeleted
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(public Point $point)
    {
        //
    }
}
