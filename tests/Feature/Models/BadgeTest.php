<?php


namespace Tests\Feature\Models;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\BadgeActuators;
use Gamify\Models\Badge;
use Tests\Feature\TestCase;

final class BadgeTest extends TestCase
{
    #[Test]
    public function it_should_return_the_default_image_if_badge_has_not_image(): void
    {
        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        $this->assertEquals('/images/missing_badge.png', $badge->image);
    }

    #[Test]
    public function it_should_return_only_active_badges(): void
    {
        Badge::factory()
            ->inactive()
            ->count(3)
            ->create();

        $want = Badge::factory()
            ->active()
            ->count(2)
            ->create();

        $this->assertEquals($want->pluck('name'), Badge::active()->pluck('name'));
    }

    #[Test]
    public function it_should_return_only_active_badges_with_the_specified_actuators(): void
    {
        Badge::factory()
            ->inactive()
            ->create([
                'actuators' => BadgeActuators::OnQuestionAnswered,
            ]);

        $want = Badge::factory()
            ->active()
            ->count(2)
            ->create([
                'actuators' => BadgeActuators::OnUserLoggedIn,
            ]);

        $badges = Badge::query()
            ->withActuatorsIn([
                BadgeActuators::OnUserLoggedIn,
            ])
            ->get();

        $this->assertEquals($want->pluck('name'), $badges->pluck('name'));
    }

    #[Test]
    public function it_should_return_only_active_badges_with_the_question_actuators_and_specified_tags(): void
    {
        // active but without tags
        Badge::factory()
            ->active()
            ->create([
                'actuators' => BadgeActuators::OnQuestionAnswered,
            ]);

        // active and with one matching tag: 'tag1'
        $want = Badge::factory()
            ->active()
            ->count(2)
            ->create([
                'actuators' => BadgeActuators::OnQuestionAnswered,
            ]);

        $want->each(function ($badge) {
            /** @var Badge $badge */
            $badge->tag(['tag1', 'foo']);
        });

        $got = Badge::triggeredByQuestionsWithTagsIn(['tag1', 'bar']);

        $this->assertEquals($want->count(), $got->count());

        $this->assertEquals($want->pluck('name'), $got->pluck('name'));
    }
}
