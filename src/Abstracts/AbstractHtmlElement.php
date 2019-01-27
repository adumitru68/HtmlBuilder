<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\PrototypeException;
use Qpdb\HtmlBuilder\Elements\Parts\TagAttributes;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Helper\TagsInformation;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Interfaces\TagAttributesInterface;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;


abstract class AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator;

	/**
	 * @var string;
	 */
	protected $tag;

	/**
	 * @var TagAttributesInterface
	 */
	protected $attributes;

	/**
	 * @var HtmlElementInterface[]|string[]
	 */
	protected $htmlElements = [];


	/**
	 * AbstractHtmlElement constructor.
	 * @param TagAttributesInterface $tagAttributes
	 * @throws HtmlBuilderException
	 */
	public function __construct( TagAttributesInterface $tagAttributes = null ) {
		$this->checkTag();
		$this->attributes = $tagAttributes ?: new TagAttributes();
	}

	/**
	 * @throws HtmlBuilderException
	 */
	protected function checkTag() {
		if ( TagsInformation::getInstance()->isTag( $this->getTag() ) || empty( $this->getTag() ) ) {
			$this->tag = $this->getTag();
		} else {
			throw new HtmlBuilderException( 'It not is html5 tag: ' . $this->getTag() );
		}
	}

	/**
	 * @return string
	 */
	abstract public function getTag();

	/**
	 * @return HtmlElementInterface[]|string[]
	 */
	public function getChildren() {
		return $this->htmlElements;
	}

	/**
	 * @param TagAttributesInterface $tagAttributes
	 * @return $this
	 */
	public function withTagAttributes( TagAttributesInterface $tagAttributes ) {
		$this->attributes = $tagAttributes;

		return $this;
	}

	/**
	 * @return TagAttributesInterface
	 */
	public function getTagAttributes() {
		return $this->attributes;
	}

	/**
	 * @param string $name
	 * @param string $value
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws PrototypeException
	 */
	public function withAttribute( $name, $value = null ) {
		$this->attributes->withAttribute( $name, $value );

		return $this;
	}

	public function withId( $id ) {
		$this->attributes->withAttribute( ConstHtml::ATTRIBUTE_ID, $id );

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSelfClosed() {
		return TagsInformation::getInstance()->isSelfClosedTag( $this->tag );
	}

	/**
	 * @return bool
	 */
	public function isInlineTag() {
		if ( empty( $this->getTag() ) ) {
			return true;
		}

		return TagsInformation::getInstance()->isInlineTag( $this->getTag() );
	}


	/**
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public static function create() {
		return new static();
	}

	/**
	 * @return string
	 */
	protected function getComputedAttributes() {
		return $this->attributes->getComputedAttributes();
	}

}

