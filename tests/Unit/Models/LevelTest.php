<?php


namespace Tests\Unit\Models;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Level;
use Tests\TestCase;

final class LevelTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new Level();
        $this->assertEquals([
            'name',
            'required_points',
            'active',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new Level();
        $this->assertEquals([
            'id' => 'int',
            'active' => 'boolean',
            'deleted_at' => 'datetime',
        ], $m->getCasts());
    }

    #[Test]
    public function it_returns_the_default_level(): void
    {
        $level = Level::defaultLevel();

        $this->assertInstanceOf(Level::class, $level);

        $this->assertEquals(0, $level->required_points);

        $this->assertEquals('Default', $level->name);

        $this->assertTrue($level->active);
    }
}
