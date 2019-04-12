<?php


namespace Qpdb\Tests\Helper\Html;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\HtmlHelper;
use stdClass;

class ParseInLineStyleTest extends TestCase
{
    /**
     * @return array
     */
    public function inlineStyles()
    {
        return [
            ['height:20px;width:100px; padding:10px; margin: 20px', ['height' => '20px', 'width' => '100px', 'padding' => '10px', 'margin' => '20px']],
            ['   height:;width:100px; :10px; margin', ['width' => '100px']],
            ['', []],
            ['height: 10px; width:
                5px', ['height' => '10px', 'width' => '5px']],
            ['NULL', []],
            ['null', []]
        ];
    }

    /**
     * @return array
     */
    public function invalidInlineStyles() {
        return [
            [null],
            [1, 2, 3, 4],
            [new stdClass()]
        ];
    }

    /**
     * @test
     * @dataProvider inlineStyles
     * @param $styles
     * @param $expected
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function parseInLineStyle($styles, $expected)
    {
        $actual = HtmlHelper::parseInLineStyle($styles);
        self::assertEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider invalidInlineStyles
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function parseInLineStylesThrowsException($invalidInlineStyles) {
        $this->expectException(CommonException::class);
        HtmlHelper::parseInLineStyle([1, 3, 4]);
    }
}