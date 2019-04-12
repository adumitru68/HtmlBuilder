<?php


namespace Qpdb\Tests\Elements\Footer;


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
     */
    public function createFooter() {
        $footer = Html::footer();

        $expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
        $actual = $footer->getMarkup();

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}