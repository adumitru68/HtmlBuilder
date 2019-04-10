<?php


namespace Qpdb\Tests\Elements\Form\Simple;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\Input;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function CreateFormWithOnlySubmitButtonAndMethodPost()
    {
        $form = Html::form()->methodPost()->withHtmlElement(
            Html::input()->submit()->name('Send')
        );

        $expected = file_get_contents(__DIR__ . '/expected-input.txt');
        $actual = $form->getMarkup();

        self::assertEquals($expected, $actual);
    }
}