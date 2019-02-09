<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:01 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;

class HtmlSection extends AbstractHtmlElement
{

	/**
	 * @return string
	 */
	public function getTag() {
		return 'section';
	}
}