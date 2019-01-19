<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/25/2018
 * Time: 11:30 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlDiv extends AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator, CanHaveChildren;

	/**
	 * @return string
	 */
	public function getTag() {
		return 'div';
	}

}