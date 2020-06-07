<?php


namespace Elements\Link;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\TestStrings;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createLink() {
        $link = Html::link()->href('href');

        $actual = $link->getMarkup();
        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}