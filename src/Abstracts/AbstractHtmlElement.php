<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Elements\OldTagAttributes;
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
	 * @param TagAttributesInterface $tagAttributes
	 */
	public function __construct( TagAttributesInterface $tagAttributes = null ) {
		$this->tags = TagsInformation::getInstance();
		$this->attributes = $tagAttributes ?: new OldTagAttributes();
	}

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
	public function setTagAttributes( TagAttributesInterface $tagAttributes ) {
		$this->attributes = $tagAttributes;

		return $this;
	}

	/**
	 * @return OldTagAttributes|TagAttributesInterface
	 */
	public function getTagAttributes() {
		return $this->attributes;
	}

	/**
	 * @return string
	 */
	abstract public function getTag();

	/**
	 * @return bool
	 */
	abstract public function isSelfClosed();

	/**
	 * @return string
	 */
	protected function getComputedAttributes() {
		return $this->attributes->getComputedAttributes();
	}

	/**
	 * @return $this
	 */
	public static function create() {
		return new static();
	}

}

