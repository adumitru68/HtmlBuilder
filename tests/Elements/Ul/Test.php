<?php


namespace Elements\Ul;


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
    public function createOl() {
        $ul = Html::ul()->withHtmlElement(
            Html::li()->withPlainText('Coffee'),
            Html::li()->withPlainText('Tea'),
            Html::li()->withPlainText('Milk')
        );

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $ul->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}