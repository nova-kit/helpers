<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Orchestra\Testbench\Factories\UserFactory;
use Orchestra\Testbench\TestCase;
use function NovaKit\safe_key;

class EloquentSafeKeyTest extends TestCase
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

    /** @test */
    public function it_can_get_safe_key_for_a_model()
    {
        $user = UserFactory::new()->create();

        $this->assertSame($user->getKey(), safe_key($user));
    }

    /** @test */
    public function it_cant_get_safe_key_for_a_pivot_without_primary_key()
    {
        $this->assertNull(safe_key(new Pivot));
    }
}
