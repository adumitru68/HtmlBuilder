<?php


namespace Qpdb\Tests\Elements\A;


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
    public function createATagTargetBlank()
    {
        $a = Html::a('A tag')
                    ->href('href.com')
                    ->title('title')
                    ->withClass(['test-class', 'second-class'])
                    ->withStyle(['color:red', 'margin:0'])
                    ->targetBlank();
        $actual = $a->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-target-blank.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function createATagTargetSelf() {
        $a = Html::a('A tag')
            ->href('href.com')
            ->title('title')
            ->withClass(['test-class', 'second-class'])
            ->withStyle(['color:red', 'margin:0'])
            ->targetSelf();
        $actual = $a->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-target-self.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function createATagTargetParent() {
        $a = Html::a('A tag')
            ->href('href.com')
            ->title('title')
            ->withClass(['test-class', 'second-class'])
            ->withStyle(['color:red', 'margin:0'])
            ->targetParent();
        $actual = $a->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-target-parent.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function createATagTargetTop() {
        $a = Html::a('A tag')
            ->href('href.com')
            ->title('title')
            ->withClass(['test-class', 'second-class'])
            ->withStyle(['color:red', 'margin:0'])
            ->targetTop();
        $actual = $a->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-target-top.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function createATagWithLabel() {
        $a = Html::a()
            ->href('href.com')
            ->title('title')
            ->withClass(['test-class', 'second-class'])
            ->withStyle(['color:red', 'margin:0'])
            ->targetBlank()
            ->label('Test label method');
        $actual = $a->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-label-method.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}