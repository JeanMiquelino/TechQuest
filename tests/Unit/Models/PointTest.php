<?php


namespace Tests\Unit\Models;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Point;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

final class PointTest extends TestCase
{
    #[Test]
    public function it_should_contain_valid_fillable_properties(): void
    {
        $m = new Point();
        $this->assertEquals([
            'points',
            'description',
        ], $m->getFillable());
    }

    #[Test]
    public function it_should_contain_valid_casts_properties(): void
    {
        $m = new Point();
        $this->assertEquals([
            'id' => 'int',
        ], $m->getCasts());
    }

    #[Test]
    public function it_should_have_a_user_relation(): void
    {
        $m = new Point();
        $r = $m->user();
        $this->assertInstanceOf(BelongsTo::class, $r);
    }
}
