<?php

namespace NovaKit\Tests\Unit;

use function NovaKit\safe_int;
use PHPUnit\Framework\TestCase;

class SafeIntTest extends TestCase
{
    /**
     * @test
     * @dataProvider castIdsDataProvider
     */
    public function it_can_cast_ids($given, $expected)
    {
        $this->assertSame($expected, safe_int($given));
    }

    public function castIdsDataProvider()
    {
        yield [1, 1];
        yield ['foo', 'foo'];
        yield [9007199254741001, '9007199254741001'];
    }
}