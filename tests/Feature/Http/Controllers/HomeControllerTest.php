<?php


namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class HomeControllerTest extends TestCase
{
    #[Test]
    public function index_returns_proper_content(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('home'))
            ->assertSuccessful()
            ->assertViewIs('home.index')
            ->assertViewHasAll([
                'questions',
                'usersInRanking',
            ]);
    }
}
