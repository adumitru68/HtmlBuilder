<?php


namespace Qpdb\Tests\Helper\Html;


use PHPUnit\Framework\TestCase;
use Qpdb\HtmlBuilder\Helper\HtmlHelper;

class IsDataAttributeTest extends TestCase
{
    public function validDataAttributes() {
        return [
            ['data-some-attribute'],
            ['data-something'],
            ['data-1234']
        ];
    }

    /**
     * @return array
     */
    public function invalidDataAttributes()
    {
        return [
            ['some-attribute'],
            ['data_something'],
            ['1234'],
            [1234],
            ['1234-data-attribute'],
            [''],
            [null],
            [0],
        ];
    }

    /**
     * @test
     * @dataProvider validDataAttributes
     * @param string $validDataAttribute
     */
    public function isDataAttributeTrue($validDataAttribute) {
        self::assertTrue(HtmlHelper::isDataAttribute($validDataAttribute));
    }

    /**
     * @test
     * @dataProvider invalidDataAttributes
     * @param mixed $attributeToTest
     */
    public function isDataAttributeFalse($attributeToTest) {
        self::assertFalse(HtmlHelper::isDataAttribute($attributeToTest));
    }
}