<?php


namespace Tests\Feature\Libs\Game;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;
use Gamify\Models\Point;
use Gamify\Models\User;
use Generator;
use Illuminate\Support\Arr;
use Tests\Feature\TestCase;

final class GameTest extends TestCase
{
    #[Test]
    public function it_increments_repetitions_for_a_given_badge(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 5,
        ]);

        Game::incrementBadgeCount($user, $badge);

        /** @phpstan-ignore-next-line */
        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)->repetitions);
    }

    #[Test]
    public function it_increments_repetitions_for_a_given_badge_that_was_already_initiated(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 5,
        ]);

        Game::incrementBadgeCount($user, $badge);

        Game::incrementBadgeCount($user, $badge);

        /** @phpstan-ignore-next-line */
        $this->assertEquals(2, $user->progressToCompleteTheBadge($badge)->repetitions);
    }

    #[Test]
    public function it_completes_badge_when_reach_required_repetitions(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 1,
        ]);

        Game::incrementBadgeCount($user, $badge);

        $this->assertTrue($user->hasUnlockedBadge($badge));
    }

    #[Test]
    public function it_does_not_complete_badge_when_required_repetitions_are_not_reached(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 5,
        ]);

        Game::incrementBadgeCount($user, $badge);

        $this->assertFalse($user->hasUnlockedBadge($badge));
    }

    #[Test]
    public function it_does_not_update_repetitions_if_badge_was_already_completed(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 1,
        ]);

        Game::unlockBadgeFor($user, $badge);

        Game::incrementBadgeCount($user, $badge);

        /** @phpstan-ignore-next-line */
        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)->repetitions);
    }

    #[Test]
    public function it_completes_a_badge_for_a_user(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        Game::unlockBadgeFor($user, $badge);

        $this->assertTrue($user->hasUnlockedBadge($badge));
    }

    #[Test]
    public function it_completes_a_badge_when_a_user_had_already_started_it(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'required_repetitions' => 5,
        ]);

        Game::incrementBadgeCount($user, $badge); // Badge is started and not completed.

        Game::unlockBadgeFor($user, $badge);

        $this->assertTrue($user->hasUnlockedBadge($badge));
    }

    #[Test]
    #[DataProvider('provideRankingTestCases')]
    public function it_should_return_the_first_players_with_the_highest_score(
        int $numberOfPlayers,
        array $expectedPlayers,
    ): void {
        $this->prepareUsersWithExperience();

        $got = Game::getTopExperiencedPlayers($numberOfPlayers);

        $this->assertEquals($expectedPlayers, $got->pluck('name')->toArray());

        $got->each(function ($item) {
            $this->assertTrue(Arr::has($item, ['username', 'name', 'experience', 'level']));
        });
    }

    public static function provideRankingTestCases(): Generator
    {
        yield 'top players is zero' => [
            'numberOfPlayers' => 0,
            'expectedPlayers' => [],
        ];

        yield 'top players is smaller than total players' => [
            'numberOfPlayers' => 3,
            'expectedPlayers' => ['User 50', 'User 40', 'User 30'],
        ];

        yield 'top players is bigger than total players' => [
            'numberOfPlayers' => 6,
            'expectedPlayers' => ['User 50', 'User 40', 'User 30', 'User 20', 'User 10'],
        ];
    }

    private function prepareUsersWithExperience(): void
    {
        $points = 10;

        for ($i = 0; $i < 5; $i++) {
            $user = User::factory()->create([
                'name' => 'User '.$points,
            ]);

            Point::factory()
                ->for($user)
                ->create([
                    'points' => $points,
                ]);

            $points += 10;
        }
    }
}
