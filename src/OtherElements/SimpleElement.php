<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 1:31 PM
 */

namespace Qpdb\HtmlBuilder\OtherElements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Helper\TagsCollection;
use Qpdb\HtmlBuilder\Html;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class SimpleElement extends AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator;

	/**
	 * @var Html
	 */
	protected $html;

	public function __construct( Html $html )
	{
		$this->html = $html;
	}

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		TagsCollection::getInstance()->addNewTag( $this->html->getHtmlTag() );
		TagsCollection::getInstance()->addNewClosedTags( $this->html->getHtmlTag() );

		return $this->html->getHtmlTag();
	}
}