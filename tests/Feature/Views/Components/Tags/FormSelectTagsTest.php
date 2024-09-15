<?php


namespace Tests\Feature\Views\Components\Tags;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Question;
use Gamify\View\Components\Tags\FormSelectTags;
use Tests\Feature\TestCase;

final class FormSelectTagsTest extends TestCase
{
    #[Test]
    public function it_should_render_the_tags_component(): void
    {
        // Create some tags by tagging a model.
        $wantAvailableTags = ['foo', 'bar'];

        /** @var Question $question */
        $question = Question::factory()->create();
        $question->tag($wantAvailableTags);

        $this->component(FormSelectTags::class, [
            'name' => 'test',
            'placeholder' => '',
            'selectedTags' => [],
        ])
            ->assertSee('id="test"', false)
            ->assertSee('name="test[]"', false)
            ->assertSeeTextInOrder($wantAvailableTags);
    }
}
