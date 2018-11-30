<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 1:39 PM
 */

namespace Qpdb\HtmlBuilder\OtherElements;


use Qpdb\HtmlBuilder\Helper\TagsCollection;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlElement extends SimpleElement
{
	use CanHaveChildren;

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		TagsCollection::getInstance()->addNewTag($this->html->getHtmlTag());
		return $this->html->getHtmlTag();
	}
}