<?php


namespace Tests\Feature\Services;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\User;
use Gamify\Services\UsernameGeneratorService;
use Tests\Feature\TestCase;

final class UsernameGeneratorServiceTest extends TestCase
{
    #[Test]
    #[DataProvider('providesTestCasesForUsernameCreationFromText')]
    public function it_should_return_a_username_from_the_text(
        string $input,
        string $want
    ): void {
        User::factory()
            ->count(3)
            ->sequence(
                ['username' => 'foo3'],
                ['username' => 'foo1'],
                ['username' => 'foo'],
            )
            ->create();

        $generator = new UsernameGeneratorService();

        $this->assertEquals($want, $generator->fromText($input));
    }

    public static function providesTestCasesForUsernameCreationFromText(): \Generator
    {
        yield 'return the same username if not duplicated' => [
            'input' => 'bar',
            'want' => 'bar',
        ];

        yield 'return a prefixed username if duplicated' => [
            'input' => 'foo',
            'want' => 'foo2',
        ];

        yield 'return a default username if input is empty' => [
            'input' => '',
            'output' => 'player',
        ];
    }

    #[Test]
    #[DataProvider('providesTestCasesForUsernameCreationFromEmail')]
    public function it_should_return_a_username_from_the_email(
        string $input,
        string $want
    ): void {
        User::factory()->create([
            'username' => 'foo',
        ]);

        $generator = new UsernameGeneratorService();

        $this->assertEquals($want, $generator->fromEmail($input));
    }

    public static function providesTestCasesForUsernameCreationFromEmail(): \Generator
    {
        yield 'return the same username if not duplicated' => [
            'input' => 'bar@domain.local',
            'want' => 'bar',
        ];

        yield 'return a prefixed username if duplicated' => [
            'input' => 'foo@domain.local',
            'want' => 'foo1',
        ];
    }

    #[Test]
    public function it_should_raise_exception_if_email_is_not_valid(): void
    {
        $generator = new UsernameGeneratorService();

        $this->expectException(\InvalidArgumentException::class);

        $generator->fromEmail('is-not-an-email');
    }
}
