<?php


namespace Qpdb\Tests\Helper\Html;


use PHPUnit\Framework\TestCase;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\HtmlHelper;

class ValidateNameOfAttributeTest extends TestCase
{
    public function validAttributes()
    {
        return [
            ['a'],
            ['abc'],
            ['12df4'],
            ['1234_ere'],
            ['12354-ab'],
            ['1234-df_xwr'],
            ['_-1sdf'],
            ['--'],
        ];
    }

    public function invalidAttributes()
    {
        return [
            [''],
            [null],
            [0],
            [123],
            [-2],
            ['abec!'],
            ['@ewer'],
            ['valid@not-realy'],
        ];
    }

    /**
     * @test
     * @dataProvider validAttributes
     * @param mixed $name
     * @throws HtmlBuilderException
     */
    public function validateNameOfAttribute($name)
    {
        HtmlHelper::validateNameOfAttribute($name);
        self::assertTrue(true);
    }

    /**
     * @test
     * @dataProvider invalidAttributes
     * @param mixed $name
     * @throws HtmlBuilderException
     */
    public function validateNameOfAttributeFail($name)
    {
        $this->expectException(HtmlBuilderException::class);
        HtmlHelper::validateNameOfAttribute($name);
    }
}