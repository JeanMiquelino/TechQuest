<?php


namespace Tests\Unit\Models;

use Gamify\Models\LinkedSocialAccount;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

final class LinkedSocialAccountTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new LinkedSocialAccount();
        $this->assertEquals([
            'provider_name',
            'provider_id',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new LinkedSocialAccount();
        $this->assertEquals([
            'id' => 'int',
        ], $m->getCasts());
    }

    public function test_user_relation(): void
    {
        $m = new LinkedSocialAccount();
        $r = $m->user();
        $this->assertInstanceOf(BelongsTo::class, $r);
    }
}
