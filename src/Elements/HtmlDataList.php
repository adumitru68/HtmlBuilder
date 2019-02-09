<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:58 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlDataList extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @return string
	 */
	public function getTag() {
		return 'datalist';
	}
}