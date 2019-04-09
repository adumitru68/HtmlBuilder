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

        $input = new Input(__DIR__);
        $input->setGeneratedInput($form);
        $expected = $input->getExpectedInput();
        $actual = $input->getGeneratedInput();

        self::assertEquals($expected, $actual);
    }
}