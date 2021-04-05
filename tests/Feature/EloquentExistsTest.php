<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use function NovaKit\eloquent_exists;
use Orchestra\Testbench\Factories\UserFactory;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\eloquent_exists() tests.
 */
class EloquentExistsTest extends TestCase
{
    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }

    /**
     * @test
     */
    public function it_can_detect_existing_model()
    {
        $user = UserFactory::new()->create();

        $this->assertTrue(eloquent_exists($user));
    }

    /**
     * @test
     */
    public function it_can_detect_none_existing_model()
    {
        $user = new User();

        $this->assertFalse(eloquent_exists($user));
    }
}
