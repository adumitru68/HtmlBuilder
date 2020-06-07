<?php


namespace Elements\DataList;


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
     * @throws CommonException
     */
    public function createSimpleDivElementContainingOneSpanElement()
    {
        $dataList = Html::datalist()->id('browsers')->options([
            Html::optionData('Internet Explorer'),
            Html::optionData('Firefox'),
            Html::optionData('Chrome'),
            Html::optionData('Opera'),
            Html::optionData('Safari')
        ]);

        $expected = file_get_contents(__DIR__ . '/' . 'expected-tag.txt');
        $actual = $dataList->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}