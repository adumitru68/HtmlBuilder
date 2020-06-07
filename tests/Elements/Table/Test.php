<?php


namespace Elements\Table;


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
    public function createTable() {
        $table = Html::table()->withHtmlElement(
            Html::tr()->withHtmlElement(
                Html::th()->withPlainText('TH'),
                Html::th()->withPlainText('TH')
            ),
            Html::tr()->withHtmlElement(
                Html::td()->withPlainText('A'),
                Html::td()->withPlainText('B')
            ),
            Html::tr()->withHtmlElement(
                Html::td()->withPlainText('C'),
                Html::td()->withPlainText('D')
            )
        );

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $table->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}