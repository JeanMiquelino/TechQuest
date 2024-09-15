<?php


namespace Tests\Feature\Http\Controllers\Admin;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\Roles;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Generator;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestCase;

final class AdminRewardControllerTest extends TestCase
{
    use WithFaker;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();

        $this->user = $user;
    }

    #[Test]
    public function players_should_not_see_the_index_view(): void
    {
        $this
            ->actingAs($this->user)
            ->get(route('admin.rewards.index'))
            ->assertForbidden();
    }

    #[Test]
    public function admins_should_see_the_index_view(): void
    {
        $this->user->role = Roles::Admin();

        $users = User::factory()
            ->count(2)
            ->create();

        $badges = Badge::factory()
            ->count(2)
            ->create();

        $this
            ->actingAs($this->user)
            ->get(route('admin.rewards.index'))
            ->assertSuccessful()
            ->assertViewIs('admin.reward.index');
    }

    #[Test]
    public function players_should_not_reward_experience(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $want = [
            'points' => $this->faker->numberBetween(1, 10),
            'message' => $this->faker->sentence,
        ];

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.experience'), [
                'username' => $user->username,
                'points' => $want['points'],
                'message' => $want['message'],
            ])
            ->assertForbidden();

        $user->refresh();

        $this->assertEquals(0, $user->experience);
    }

    #[Test]
    public function admins_should_reward_experience(): void
    {
        $this->user->role = Roles::Admin();

        /** @var User $user */
        $user = User::factory()->create();

        $want = [
            'points' => $this->faker->numberBetween(1, 10),
            'message' => $this->faker->sentence,
        ];

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.experience'), [
                'username' => $user->username,
                'points' => $want['points'],
                'message' => $want['message'],
            ])
            ->assertRedirect(route('admin.rewards.index'));

        $user->refresh();

        $this->assertEquals($want['points'], $user->experience);
    }

    #[Test]
    #[DataProvider('provideWrongDataForExperienceRewarding')]
    public function admins_should_get_errors_when_rewarding_experience_with_wrong_data(
        array $data,
        array $errors,
    ): void {
        $this->user->role = Roles::Admin();

        /** @var User $user */
        $user = User::factory()->create([
            'username' => 'foo',
        ]);

        $formData = [
            'username' => $data['username'] ?? $user->username,
            'points' => $data['points'] ?? $this->faker->numberBetween(1, 10),
            'message' => $data['message'] ?? $this->faker->sentence,
        ];

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.experience'), $formData)
            ->assertInvalid($errors);

        $user->refresh();

        $this->assertEquals(0, $user->experience);
    }

    public static function provideWrongDataForExperienceRewarding(): Generator
    {
        yield 'username is empty' => [
            'data' => [
                'username' => '',
            ],
            'errors' => ['username'],
        ];

        yield 'username ! a user' => [
            'data' => [
                'username' => 'bar',
            ],
            'errors' => ['username'],
        ];

        yield 'points is empty' => [
            'data' => [
                'points' => '',
            ],
            'errors' => ['points'],
        ];

        yield 'points ! a number' => [
            'data' => [
                'points' => 'not-a-number',
            ],
            'errors' => ['points'],
        ];

        yield 'message is empty' => [
            'data' => [
                'message' => '',
            ],
            'errors' => ['message'],
        ];
    }

    #[Test]
    public function players_should_not_reward_badges(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.badge'), [
                'badge_username' => $user->username,
                'badge' => $badge->id,
            ])
            ->assertForbidden();

        $user->refresh();

        $this->assertEquals(0, $user->badges()->count());
    }

    #[Test]
    public function admins_should_reward_badges(): void
    {
        $this->user->role = Roles::Admin();

        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.badge'), [
                'badge_username' => $user->username,
                'badge' => $badge->id,
            ])
            ->assertRedirect(route('admin.rewards.index'));

        $user->refresh();

        $this->assertEquals(1, $user->badges()->count());
    }

    #[Test]
    #[DataProvider('provideWrongDataForBadgeRewarding')]
    public function admins_should_get_errors_when_rewarding_badges_with_wrong_data(
        array $data,
        array $errors,
    ): void {
        $this->user->role = Roles::Admin();

        /** @var User $user */
        $user = User::factory()->create([
            'username' => 'foo',
        ]);

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        $formData = [
            'badge_username' => $data['badge_username'] ?? $user->username,
            'badge' => $data['badge'] ?? $badge->id,
        ];

        $this
            ->actingAs($this->user)
            ->post(route('admin.rewards.badge'), $formData)
            ->assertInvalid($errors);

        $user->refresh();

        $this->assertEquals(0, $user->badges()->count());
    }

    public static function provideWrongDataForBadgeRewarding(): Generator
    {
        yield 'badge_username is empty' => [
            'data' => [
                'badge_username' => '',
            ],
            'errors' => ['badge_username'],
        ];

        yield 'badge_username ! a user' => [
            'data' => [
                'badge_username' => 'bar',
            ],
            'errors' => ['badge_username'],
        ];

        yield 'badge is empty' => [
            'data' => [
                'badge' => '',
            ],
            'errors' => ['badge'],
        ];

        yield 'badge ! a badge' => [
            'data' => [
                'badge' => 'foo',
            ],
            'errors' => ['badge'],
        ];
    }
}
