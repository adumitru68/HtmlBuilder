<?php


namespace Qpdb\Tests\Elements\Aside;


use PHPUnit\Framework\TestCase;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\Strings;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     */
    public function createPlainAsideTag() {
        $aside = Html::aside();

        $actual = $aside->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     */
    public function createAsideWithContent() {
        $aside = Html::aside()->withHtmlElement(
            Html::span()->withPlainText('Epcot Center')->withClass('title'),
            Html::p()->withPlainText('The Epcot Center is a theme park in Disney World, Florida.')
        );

        $actual = $aside->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-with-content.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}