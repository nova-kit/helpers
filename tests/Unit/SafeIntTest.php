<?php

namespace NovaKit\Tests\Unit;

use function NovaKit\safe_int;
use PHPUnit\Framework\TestCase;

class SafeIntTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider castSafeIntDataProvider
     */
    public function it_can_cast_safe_int($given, $expected)
    {
        $this->assertSame($expected, safe_int($given));
    }

    public function castSafeIntDataProvider()
    {
        yield [1, 1];
        yield ['foo', 'foo'];
        yield [9007199254741001, '9007199254741001'];
        yield [-9007199254741001, '-9007199254741001'];
    }
}
