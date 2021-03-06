<?php


namespace Elements\Container;


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
     */
    public function createSimpleDivElementContainingOneSpanElement() {
        $container = Html::container();

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $container->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}