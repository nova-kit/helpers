<?php

namespace NovaKit\Tests\Unit;

use function NovaKit\schemaless_url;
use Orchestra\Testbench\TestCase;

class SchemalessUrlTest extends TestCase
{
    /**
     * @test
     * @dataProvider castSchemalessUrlDataProvider
     */
    public function it_can_cast_schemaless_url($given, $expected)
    {
        $this->assertSame($expected, schemaless_url($given));
    }

    public function castSchemalessUrlDataProvider()
    {
        yield ['https://nova.laravel.com/', 'nova.laravel.com/'];
        yield ['http://nova.laravel.com/', 'nova.laravel.com/'];
        yield ['https://nova.laravel.com', 'nova.laravel.com'];
        yield ['http://nova.laravel.com', 'nova.laravel.com'];
    }
}
