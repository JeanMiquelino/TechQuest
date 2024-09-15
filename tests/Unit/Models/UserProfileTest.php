<?php


namespace Tests\Unit\Models;

use Gamify\Models\UserProfile;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

final class UserProfileTest extends TestCase
{
    public function test_contains_valid_fillable_properties(): void
    {
        $m = new UserProfile();
        $this->assertEquals([
            'bio',
            'date_of_birth',
            'twitter',
            'facebook',
            'linkedin',
            'github',
        ], $m->getFillable());
    }

    public function test_contains_valid_casts_properties(): void
    {
        $m = new UserProfile();
        $this->assertEquals([
            'id' => 'int',
            'date_of_birth' => 'date',
        ], $m->getCasts());
    }

    public function test_user_relation(): void
    {
        $m = new UserProfile();
        $r = $m->user();
        $this->assertInstanceOf(BelongsTo::class, $r);
    }
}
