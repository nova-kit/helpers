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

        yield ['24, 182, 155', '255, 255, 255', '24, 182, 155'];
        yield ['24, 182, 155', '0, 0, 0', '24, 182, 155'];

        yield ['24, 182, 155, 0.1', 'light', '232, 248, 245'];
        yield ['24, 182, 155, 0.1', 'dark', '13, 85, 115'];

        yield ['24, 182, 155, 0.1', '255, 255, 255', '232, 248, 245'];
        yield ['24, 182, 155, 0.1', '0, 0, 0', '2, 18, 16'];

        yield ['24, 182, 155, 0.5', 'light', '140, 219, 205'];
        yield ['24, 182, 155, 0.5', 'dark', '18, 128, 133'];

        yield ['24, 182, 155, 0.5', '255, 255, 255', '140, 219, 205'];
        yield ['24, 182, 155, 0.5', '0, 0, 0', '12, 91, 78'];

        yield ['24, 182, 155, 0.75', 'light', '82, 200, 180'];
        yield ['24, 182, 155, 0.75', 'dark', '21, 155, 144'];

        yield ['24, 182, 155, 0.75', '255, 255, 255', '82, 200, 180'];
        yield ['24, 182, 155, 0.75', '0, 0, 0', '18, 137, 116'];

        yield ['24, 182, 155, 1.25', 'light', '24, 182, 155'];
        yield ['24, 182, 155, 1.25', 'dark', '24, 182, 155'];

        yield ['24, 182, 155, 1.25', '255, 255, 255', '24, 182, 155'];
        yield ['24, 182, 155, 1.25', '0, 0, 0', '24, 182, 155'];
    }
}
