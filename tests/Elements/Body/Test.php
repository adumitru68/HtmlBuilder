<?php


namespace Elements\Body;


use PHPUnit\Framework\TestCase;
use Qpdb\HtmlBuilder\Elements\HtmlBody;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\TestStrings;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     */
    public function createPlainBodyTag() {
        $body = new HtmlBody();

        $actual = $body->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input.txt');

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}