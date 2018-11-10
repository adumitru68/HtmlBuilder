<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 2:25 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlA extends AbstractHtmlElement implements HtmlElementInterface
{
	use MarkupGenerator, CanHaveChildren;

	const TARGET_BLANK = '_blank';
	const TARGET_SELF = '_self';
	const TARGET_PARENT = '_parent';
	const TARGET_TOP = '_top';

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'a';
	}

	/**
	 * @param $href
	 * @return $this
	 * @throws Exceptions\HtmlBuilderException
	 */
	public function href($href) {
		return $this->withAttribute('href', $href);
	}

	/**
	 * @param $target
	 * @return $this
	 * @throws Exceptions\HtmlBuilderException
	 */
	public function target($target) {
		return $this->withAttribute('target', $target);
	}
}