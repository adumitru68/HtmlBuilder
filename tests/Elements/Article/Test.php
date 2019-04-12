<?php


namespace Qpdb\Tests\Elements\Article;


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
    public function createArticleTag() {
        $article = Html::article()->title('Article title');
        $actual = $article->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     */
    public function createArticleTagWithHeader() {
        $article = Html::article()->withHtmlElement(
            Html::header()->withPlainText('Article header')
        );

        $actual = $article->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-with-header-content.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     */
    public function createArticleTagWithPlainText() {
        $article = Html::article()->withPlainText('        This is a simple article tag.
');

        $actual = $article->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input-with-plain-text.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}