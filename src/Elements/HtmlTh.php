<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 10:45 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlTh extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @return string
	 */
	public function getTag() {
		return 'th';
	}
}