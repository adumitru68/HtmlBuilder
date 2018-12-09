<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Helper\Tags;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\MakeAttributes;

abstract class AbstractHtmlElement
{

	use MakeAttributes;

	/**
	 * @var Tags
	 */
	protected $tags;

	/**
	 * @var array
	 */
	protected $attributes = [
		ConstHtml::ATTRIBUTE_ID => null,
		ConstHtml::ATTRIBUTE_NAME => null,
		ConstHtml::ATTRIBUTE_VALUE => null,
		ConstHtml::ATTRIBUTE_CLASS => [],
		ConstHtml::ATTRIBUTE_STYLE => [],
	];

	/**
	 * @var HtmlElementInterface[]|string[]
	 */
	protected $htmlElements = [];


	/**
	 * AbstractHtmlElement constructor.
	 * @param Tags|null $tags
	 */
	public function __construct( Tags $tags = null )
	{
		$this->tags = $tags ?: Tags::getInstance();
	}

	/**
	 * @return string||null
	 */
	abstract protected function getHtmlTag();

	/**
	 * @return bool
	 */
	protected function isSelfClosed()
	{
		return true;
	}

	/**
	 * @return $this
	 */
	public static function create()
	{
		return new static();
	}

}

