<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 2:14 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlDiv extends AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator, CanHaveChildren;

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'div';
	}

}