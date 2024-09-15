<?php


namespace Tests\Unit\Models;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\QuestionChoice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

final class QuestionChoiceTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new QuestionChoice();
        $this->assertEquals([
            'text',
            'score',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new QuestionChoice();
        $this->assertEquals([
            'id' => 'int',
        ], $m->getCasts());
    }

    public function test_question_relation(): void
    {
        $m = new QuestionChoice();
        $r = $m->question();
        $this->assertInstanceOf(BelongsTo::class, $r);
    }

    #[Test]
    public function it_is_considered_correct_when_score_is_positive(): void
    {
        $m = new QuestionChoice();
        $m->score = 5;

        $this->assertTrue($m->isCorrect());
    }

    #[Test]
    public function it_is_considered_incorrect_when_score_is_zero(): void
    {
        $m = new QuestionChoice();
        $m->score = 0;

        $this->assertFalse($m->isCorrect());
    }

    #[Test]
    public function it_is_considered_incorrect_when_score_is_negative(): void
    {
        $m = new QuestionChoice();
        $m->score = -5;

        $this->assertFalse($m->isCorrect());
    }
}
