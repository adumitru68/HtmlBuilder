<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 5:22 PM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlTemplate extends AbstractHtmlElement implements HtmlElementInterface
{
	use MarkupGenerator, CanHaveChildren;

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'template';
	}
}