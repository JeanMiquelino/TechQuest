<?php


namespace Tests\Unit\Models;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Question;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

final class QuestionTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new Question();
        $this->assertEquals([
            'name',
            'question',
            'solution',
            'type',
            'hidden',
            'publication_date',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new Question();
        $this->assertEquals([
            'id' => 'int',
            'hidden' => 'bool',
            'publication_date' => 'datetime',
            'expiration_date' => 'datetime',
            'deleted_at' => 'datetime',
        ], $m->getCasts());
    }

    public function test_choices_relation(): void
    {
        $m = new Question();
        $r = $m->choices();
        $this->assertInstanceOf(HasMany::class, $r);
    }

    public function test_excerpt_method(): void
    {
        $m = new Question();

        $m->question = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit tortor sed egestas volutpat. Morbi.';

        $test_data = [
            20 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit tortor sed egestas volutpat. Morbi.',
            15 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit tortor sed egestas volutpat. Morbi.',
            14 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit tortor sed egestas volutpat....',
            3 => 'Lorem ipsum dolor...',
            0 => '',
        ];

        foreach ($test_data as $words => $want) {
            $this->assertEquals($want, $m->excerpt($words), 'Test case: '.$words.' words.');
        }
    }

    #[Test]
    public function it_should_return_the_slug_of_the_question(): void
    {
        /** @var Question $question */
        $question = Question::factory()->make();

        $this->assertNotNull($question->slug);
    }
}
