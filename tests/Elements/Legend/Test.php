<?php


namespace Elements\Legend;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\Strings;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     * @throws HtmlBuilderException
     */
    public function createLegend() {
        $legend = Html::legend()->label(['Personalia:']);

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $legend->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}