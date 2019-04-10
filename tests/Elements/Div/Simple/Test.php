<?php


namespace Qpdb\Tests\Elements\Div\Simple;


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
     * @throws CommonException
     */
    public function createSimpleDivElementContainingOneSpanElement() {
        $div = Html::div()->withClass(['test-class'])->data('testing', 'yes')->withHtmlElement(
            Html::span()->withPlainText(['Span element'])
        );

        $expected = file_get_contents(__DIR__  . '/' . 'expected-input.txt');
        $actual = $div->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}