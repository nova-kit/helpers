<?php

namespace NovaKit\Tests\Unit;

use function NovaKit\color;
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    /**
     * @dataProvider colorDataProvider
     */
    public function test_it_can_calculate_color($foreground, $background, $expected)
    {
        $this->assertSame($expected, color($foreground, $background));
    }

    public function colorDataProvider()
    {
        yield ['24, 182, 155', 'light', '24, 182, 155'];
        yield ['24, 182, 155', 'dark', '24, 182, 155'];

        yield ['24, 182, 155, 0.1', 'light', '232, 248, 245'];
        yield ['24, 182, 155, 0.1', 'dark', '13, 85, 115'];

        yield ['24, 182, 155, 0.5', 'light', '140, 219, 205'];
        yield ['24, 182, 155, 0.5', 'dark', '18, 128, 133'];

        yield ['24, 182, 155, 0.75', 'light', '82, 200, 180'];
        yield ['24, 182, 155, 0.75', 'dark', '21, 155, 144'];

        yield ['24, 182, 155, 1.25', 'light', '24, 182, 155'];
        yield ['24, 182, 155, 1.25', 'dark', '24, 182, 155'];
    }
}
