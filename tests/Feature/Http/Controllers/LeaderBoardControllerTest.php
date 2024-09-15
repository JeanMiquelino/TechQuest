<?php


namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\TestCase;

final class LeaderBoardControllerTest extends TestCase
{
    #[Test]
    public function it_should_be_accessible_for_guests(): void
    {
        $this
            ->get(route('leaderboard'))
            ->assertSuccessful()
            ->assertViewIs('leaderboard.index')
            ->assertViewHasAll([
                'usersInRanking',
            ]);
    }
}
