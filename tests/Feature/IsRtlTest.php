<?php

namespace NovaKit\Tests\Feature;

use function NovaKit\is_rtl;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\is_rtl() tests
 */
class IsRtlTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider localeDataProvider
     */
    public function it_can_detect_locale($locale, $direction)
    {
        app()->setLocale($locale);

        $this->assertSame($direction, is_rtl() ? 'rtl' : 'ltr');
    }

    public static function localeDataProvider()
    {
        yield ['en', 'ltr'];
        yield ['ms', 'ltr'];
        yield ['ar', 'rtl'];
        yield ['ckb', 'rtl'];
        yield ['uz_AF', 'rtl'];
    }
}
