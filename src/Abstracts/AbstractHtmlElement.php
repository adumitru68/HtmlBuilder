<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Helper\HtmlDef;
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
		HtmlElementInterface::ATTRIBUTE_ID => null,
		HtmlDef::ATTRIBUTE_NAME => null,
		HtmlElementInterface::ATTRIBUTE_CLASS => [],
		HtmlElementInterface::ATTRIBUTE_STYLE => [],
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
	protected function isContainer()
	{
		return false;
	}

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

