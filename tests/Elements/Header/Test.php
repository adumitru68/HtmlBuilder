<?php


namespace Elements\Header;


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
    public function createHeader() {
        $header = Html::header();

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $header->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}