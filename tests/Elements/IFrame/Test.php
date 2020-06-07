<?php


namespace Elements\IFrame;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\Strings;

class Test extends TestCase
{

	/**
	 * @test
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function createIframe() {
		$iframe = Html::iframe('iframe')->lazyLoading();

		$expected = file_get_contents(__DIR__  . '/' . 'expected-tag.txt');
		$actual = $iframe->getMarkup();

		self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
	}

}