<?php


namespace Elements\Nav;


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
     * @throws CommonException
     */
    public function createNav() {
        $nav = Html::nav()->withHtmlElement(
            Html::a()->href('/html/')->withPlainText('HTML'),
            Html::plainText(['|']),
            Html::a()->href('/css/')->withPlainText('CSS'),
            Html::plainText(['|']),
            Html::a()->href('/js/')->withPlainText('JavaScript')
        );

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $nav->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}