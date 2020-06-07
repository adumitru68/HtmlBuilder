<?php


namespace Elements\Section;


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
     */
    public function createSection() {
        $section = Html::section();

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $section->getMarkup();

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}