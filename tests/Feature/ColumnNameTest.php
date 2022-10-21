<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use function NovaKit\column_name;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\column_name() tests
 */
class ColumnNameTest extends TestCase
{
    /** @test */
    public function it_can_translate_column_name()
    {
        $column = column_name(User::class, 'email');

        $this->assertSame('users.email', $column);
    }

    /** @test */
    public function it_can_translate_column_name_when_given_an_instance_of_eloquent()
    {
        $column = column_name(new User(), 'email');

        $this->assertSame('users.email', $column);
    }

    /** @test */
    public function it_cant_translate_column_name_when_not_given_an_instance_of_eloquent()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Given $model is not an instance of [Illuminate\Database\Eloquent\Model].');

        $column = column_name(new class()
        {
            //
        }, 'email');
    }
}
