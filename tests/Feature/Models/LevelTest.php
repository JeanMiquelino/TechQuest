<?php


namespace Tests\Feature\Models;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Level;
use Generator;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestCase;

final class LevelTest extends TestCase
{
    use WithFaker;

    #[Test]
    public function it_should_find_the_default_level_when_levels_has_not_been_created_yet(): void
    {
        $want = Level::defaultLevel();

        $level = Level::findByExperience($this->faker->randomNumber());

        $this->assertInstanceOf(Level::class, $level);

        $this->assertEquals($want->name, $level->name);

        $this->assertEquals($want->required_points, $level->required_points);
    }

    #[Test]
    public function it_should_find_next_level_even_when_levels_has_not_been_created_yet(): void
    {
        $want = Level::defaultLevel();

        $level = Level::findNextByExperience($this->faker->randomNumber());

        $this->assertInstanceOf(Level::class, $level);

        $this->assertEquals($want->name, $level->name);

        $this->assertEquals($want->required_points, $level->required_points);
    }

    #[Test]
    #[DataProvider('provideFindLevelTestCases')]
    public function it_should_return_the_proper_level_based_on_experience(
        array $levels,
        int $experience,
        string $want
    ): void {
        collect($levels)
            ->each(function ($level) {
                return Level::factory()->create([
                    'name' => $level['name'],
                    'required_points' => $level['required_points'],
                ]);
            });

        $level = Level::findByExperience($experience);

        $this->assertInstanceOf(Level::class, $level);

        $this->assertEquals($want, $level->name);
    }

    public static function provideFindLevelTestCases(): Generator
    {
        yield 'minimum level when experience 0' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 0,
            'want' => 'minimum',
        ];

        yield 'minimum level when experience is below middle level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 4,
            'want' => 'minimum',
        ];

        yield 'middle level when experience is exactly equal to middle level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 5,
            'want' => 'middle',
        ];

        yield 'middle level when experience is below maximum level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 9,
            'want' => 'middle',
        ];

        yield 'maximum level when experience is bigger than maximum level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 15,
            'want' => 'maximum',
        ];
    }

    #[Test]
    #[DataProvider('provideFindNextLevelTestCases')]
    public function it_should_return_the_next_level_based_on_experience(
        array $levels,
        int $experience,
        string $want
    ): void {
        collect($levels)
            ->each(function ($level) {
                return Level::factory()->create([
                    'name' => $level['name'],
                    'required_points' => $level['required_points'],
                ]);
            });

        $level = Level::findNextByExperience($experience);

        $this->assertInstanceOf(Level::class, $level);

        $this->assertEquals($want, $level->name);
    }

    public static function provideFindNextLevelTestCases(): Generator
    {
        yield 'middle level when experience 0' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 0,
            'want' => 'middle',
        ];

        yield 'middle level when experience is below middle level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 4,
            'want' => 'middle',
        ];

        yield 'maximum level when experience is exactly equal to middle level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 5,
            'want' => 'maximum',
        ];

        yield 'maximum level when experience is below maximum level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 9,
            'want' => 'maximum',
        ];

        yield 'maximum level when experience is bigger than maximum level' => [
            'levels' => [
                ['name' => 'minimum', 'required_points' => 0],
                ['name' => 'middle', 'required_points' => 5],
                ['name' => 'maximum', 'required_points' => 10],
            ],
            'experience' => 15,
            'want' => 'maximum',
        ];
    }

    #[Test]
    public function it_should_return_the_default_image_if_level_has_not_image(): void
    {
        /** @var Level $level */
        $level = Level::factory()->create();

        $this->assertEquals('/images/missing_level.png', $level->image);
    }
}
