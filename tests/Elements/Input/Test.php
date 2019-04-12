<?php


namespace Elements\Input;


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
    public function createInputButton()
    {
        $button = Html::input()->button();

        $actual = $button->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-button.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createFormWithMultipleInputs() {
        $form = Html::form()->methodPost()->withAction('http://sample.com')->withHtmlElement(
            Html::input()->text()->name('text-input'),
            Html::input()->password()->name('password'),
            Html::input()->color()->name('favcolor')->value('#ff0000'),
            Html::input()->number()->name('favnumber'),
            Html::input()->range()->name('points')->min(0)->max(10),
            Html::input()->hidden()->name('hidden'),
            Html::input()->date()->name('birthday'),
            Html::input()->other('other')->name('other')
        );

        $actual = $form->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-form-with-many-inputs.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createInputMultipleSelect()
    {
        $multipleSelect = Html::select()->multiple()->withOptions(
            Html::option()->value(1)->label('Volvo'),
            Html::option()->value(2)->label('Saab'),
            Html::option()->value(3)->label('Opel'),
            Html::option()->value(4)->label('Audi')
        )->selectValue(2, 3);

        $actual = $multipleSelect->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-multiple-select.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createInputReset()
    {
        $reset = Html::input()->reset();

        $actual = $reset->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-reset.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }


    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createInputSelect()
    {
        $multipleSelect = Html::select()->multiple(false)->withOptions(
            Html::option()->value(1)->label('Volvo'),
            Html::option()->value(2)->label('Saab'),
            Html::option()->value(3)->label('Opel'),
            Html::option()->value(4)->label('Audi')
        )->selectValue(2);

        $actual = $multipleSelect->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-select.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createInputSubmit()
    {
        $reset = Html::input()->submit();

        $actual = $reset->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-submit.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}