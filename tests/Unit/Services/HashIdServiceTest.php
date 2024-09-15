<?php


namespace Tests\Unit\Services;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Services\HashIdService;
use Tests\TestCase;

final class HashIdServiceTest extends TestCase
{
    #[Test]
    public function it_should_get_the_same_number_after_encoding_it_and_decoding_it(): void
    {
        $input = fake()->randomNumber();

        $s = new HashIdService();
        $hash = $s->encode($input);

        $this->assertEquals($input, $s->decode($hash));
    }

    #[Test]
    public function it_should_return_the_hash_of_the_input(): void
    {
        $number = fake()->randomNumber();

        $s = new HashIdService();

        $this->assertNotEquals($number, $s->encode($number));
    }

    #[Test]
    public function it_should_return_the_same_if_input_is_not_a_hash(): void
    {
        $number = fake()->randomNumber();

        $s = new HashIdService();

        $this->assertEquals($number, $s->decode($number));
    }
}
