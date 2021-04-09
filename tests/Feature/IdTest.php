<?php

namespace NovaKit\Tests\Feature;

use function NovaKit\id;
use Orchestra\Testbench\TestCase;

class IdTest extends TestCase
{
    /**
     * @test
     * @dataProvider castIdsDataProvider
     */
    public function it_can_cast_ids($given, $expected)
    {
        $this->assertSame($expected, id($given));
    }

    public function castIdsDataProvider()
    {
        yield [1, 1];
        yield ['foo', 'foo'];
        yield [9007199254741001, '9007199254741001'];
    }
}
