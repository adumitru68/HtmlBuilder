<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/26/2019
 * Time: 12:14 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\TagAttributesInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class CustomElement extends AbstractHtmlElement
{

	use CanHaveChildren;

	/**
	 * CustomElement constructor.
	 * @param string                     $tag
	 * @param TagAttributesInterface|null $tagAttributes
	 * @throws HtmlBuilderException
	 */
	public function __construct( $tag, TagAttributesInterface $tagAttributes = null ) {
		$this->tag = $tag;
		parent::__construct( $tagAttributes );
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return $this->tag;
	}

	/**
	 * @return AbstractHtmlElement|void
	 * @throws HtmlBuilderException
	 */
	public static function create() {
		throw new HtmlBuilderException('Please use constructor');
	}
}