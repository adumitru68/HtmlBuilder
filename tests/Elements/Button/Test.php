<?php


namespace Elements\Button;


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
    public function createButton() {
        $button = Html::button()->typeButton()->withPlainText('Button');

        $actual = $button->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-button.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createResetButton() {
        $button = Html::button()->typeReset()-> withPlainText('Reset');

        $actual = $button->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-reset.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createSubmitButton() {
        $button = Html::button()->typeSubmit()-> withPlainText('Submit');

        $actual = $button->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-submit.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}