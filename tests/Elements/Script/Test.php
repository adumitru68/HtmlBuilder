<?php


namespace Elements\Script;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\TestStrings;

class Test extends TestCase
{
    /**
     * @test
     * @throws CommonException
     * @throws HtmlBuilderException
     */
    public function createScriptTagAsync() {
        $asyncScript = Html::script()->async()->src('index.js');

        $actual = $asyncScript->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-tag-async.txt');

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }

    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createScriptJsCode() {
        $code = Html::script()->jsCode('var x = 10;')->type('text/javascript')->defer()->charset();

        $actual = $code->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-js-code.txt');

        self::assertEquals(TestStrings::removeAllSpacesFromString($expected), TestStrings::removeAllSpacesFromString($actual));
    }
}