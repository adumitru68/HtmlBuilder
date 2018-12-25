<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Elements\TagAttributes;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Helper\TagsInformation;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Interfaces\TagAttributesInterface;


abstract class AbstractHtmlElement
{

	/**
	 * @var TagsInformation
	 */
	protected $tags;

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
	 * @param TagsInformation|null   $tags
	 * @param TagAttributesInterface $tagAttributes
	 */
	public function __construct( TagsInformation $tags = null, TagAttributesInterface $tagAttributes = null ) {
		$this->tags = $tags ?: TagsInformation::getInstance();
		$this->attributes = $tagAttributes ?: new TagAttributes();
	}

	/**
	 * @return string||null
	 */
	abstract protected function getHtmlTag();

	/**
	 * @return string
	 */
	protected function getComputedAttributes() {
		return $this->attributes->getComputedAttributes();
	}

	/**
	 * @param $id
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withId( $id ) {
		$this->attributes->withAttribute( ConstHtml::ATTRIBUTE_ID, $id );

		return $this;
	}

	/**
	 * @param $title
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withTitle( $title ) {
		$this->attributes->withAttribute( ConstHtml::ATTRIBUTE_TITLE, $title );

		return $this;
	}

	/**
	 * @param mixed ...$classes
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withClass( ...$classes ) {
		$this->attributes->withAttribute( ConstHtml::ATTRIBUTE_CLASS, $classes );

		return $this;
	}

	/**
	 * @param string $attributeName
	 * @param string||array $attributeValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withAttribute( $attributeName, $attributeValue ) {
		$this->attributes->withAttribute( $attributeName, $attributeValue );

		return $this;
	}

	/**
	 * @return bool
	 */
	protected function isSelfClosed() {
		return true;
	}

	/**
	 * @return $this
	 */
	public static function create() {
		return new static();
	}

}

