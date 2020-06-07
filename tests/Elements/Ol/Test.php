<?php


namespace Elements\Ol;


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
    public function createOl() {
        $ol = Html::ol()->withHtmlElement(
            Html::li()->withPlainText('Coffee'),
            Html::li()->withPlainText('Tea'),
            Html::li()->withPlainText('Milk')
        );

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $ol->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}