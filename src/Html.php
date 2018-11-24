<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 1:11 PM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\OtherElements\ContainerElement;
use Qpdb\HtmlBuilder\OtherElements\SimpleElement;

final class Html
{

	/**
	 * @var string
	 */
	private $htmlTag;

	/**
	 * Html constructor.
	 * @param $htmlTag
	 */
	private function __construct( $htmlTag )
	{
		$this->htmlTag = $htmlTag;
	}

	/**
	 * @param $htmlTag
	 * @return $this
	 */
	private static function getThis( $htmlTag )
	{
		return new static( $htmlTag );
	}

	/**
	 * @return string
	 */
	public function getHtmlTag()
	{
		return $this->htmlTag;
	}

	/**
	 * @param string $tagElement
	 * @return SimpleElement
	 */
	public static function createSimpleElement( $tagElement = null )
	{
		return new SimpleElement( self::getThis( $tagElement ) );
	}

	/**
	 * @param string $tagElement
	 * @return ContainerElement
	 */
	public static function createContainerElement( $tagElement = null )
	{
		return new ContainerElement( self::getThis( $tagElement ) );
	}

}