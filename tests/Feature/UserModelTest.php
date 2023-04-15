<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use function NovaKit\user_model;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\user_model() tests.
 */
class UserModelTest extends TestCase
{
    /** @test */
    public function it_can_retrive_the_user_model()
    {
        $this->assertSame(User::class, user_model());
    }
}
