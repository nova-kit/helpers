<?php

namespace NovaKit\Tests\Unit;

use function NovaKit\is_column_name;
use PHPUnit\Framework\TestCase;

class IsColumnNameTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider validColumnNameDataProvider
     */
    public function it_can_validate_column_name($given)
    {
        $this->assertTrue(is_column_name($given));
    }

    /**
     * @test
     *
     * @dataProvider invalidColumnNameDataProvider
     */
    public function it_cant_validate_invalid_column_name($given)
    {
        $this->assertFalse(is_column_name($given));
    }

    /**
     * Valid column name data provider.
     *
     * @return array
     */
    public static function validColumnNameDataProvider()
    {
        yield ['fullname'];
        yield [str_pad('email', 64, 'x')];
    }

    /**
     * Valid column name data provider.
     *
     * @return array
     */
    public static function invalidColumnNameDataProvider()
    {
        yield ['email->"%27))%23injectedSQL'];
        yield [str_pad('email', 65, 'x')];
        yield [''];
        yield [null];
    }
}
