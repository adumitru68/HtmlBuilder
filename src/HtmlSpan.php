<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 2:09 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlSpan extends AbstractHtmlElement implements HtmlElementInterface
{
	use MarkupGenerator, CanHaveChildren;

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'span';
	}
}