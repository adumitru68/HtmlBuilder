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
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class CustomElement extends AbstractHtmlElement
{

	use CanHaveChildren;

	/**
	 * CustomElement constructor.
	 * @param string $tag
	 * @param array  $attributes
	 * @throws HtmlBuilderException
	 */
	public function __construct( $tag, array $attributes = null ) {
		$this->tag = $tag;
		parent::__construct( $attributes );
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