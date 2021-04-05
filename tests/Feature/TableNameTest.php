<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use function NovaKit\table_name;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\table_name() unit tests
 */
class TableNameTest extends TestCase
{
    /** @test */
    public function it_can_translate_table_name()
    {
        $table = table_name(User::class);

        $this->assertSame('users', $table);
    }

    /** @test */
    public function it_can_translate_table_name_when_given_an_instance_of_eloquent()
    {
        $table = table_name(new User());

        $this->assertSame('users', $table);
    }

    /** @test */
    public function it_cant_translate_table_name_when_not_given_an_instance_of_eloquent()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Given $model is not an instance of [Illuminate\Database\Eloquent\Model].');

        $table = table_name(new class() {
        });
    }
}
