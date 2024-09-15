<?php


namespace Tests\Unit\Models;

use Gamify\Enums\BadgeActuators;
use Gamify\Models\Badge;
use Tests\TestCase;

final class BadgeTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new Badge();
        $this->assertEquals([
            'name',
            'description',
            'required_repetitions',
            'active',
            'actuators',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new Badge();
        $this->assertEquals([
            'id' => 'int',
            'active' => 'boolean',
            'actuators' => BadgeActuators::class,
            'deleted_at' => 'datetime',
        ], $m->getCasts());
    }
}
