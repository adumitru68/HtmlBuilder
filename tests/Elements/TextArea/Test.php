<?php


namespace Elements\TextArea;


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
    public function createTextArea() {
        $textArea = Html::textarea()->text("\n")->text('This is a text area.')->text("\n")->text('This is the second line.')->text("\n");

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $textArea->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}