<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/1/2019
 * Time: 10:36 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlTemplate extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @return string
	 */
	public function getTag() {
		return 'template';
	}
}