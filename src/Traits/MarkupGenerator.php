<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 2:03 AM
 */

namespace Qpdb\HtmlBuilder\Traits;

use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

/**
 * Trait MarkupGenerator
 * @package Qpdb\HtmlBuilder\Traits
 * @var AbstractHtmlElement $this
 */
trait MarkupGenerator
{

	/**
	 * @return string
	 */
	public function getHTMLMarkup()
	{
		$content = $this->isContainer() ? $this->__getContent() : '';

		if ( !empty( $this->getHtmlTag() ) ) {
			$content = $this->__getStartTag() . $content . $this->__getEndTag();
		}

		return $content;

	}

	/**
	 * Display Html content
	 */
	public function render()
	{
		echo $this->getHTMLMarkup();
	}

	/**
	 * @return string
	 */
	private function __getAttributes()
	{
		$allAttributes = [];

		if ( !empty( $this->id ) ) {
			$allAttributes[ self::ATTRIBUTE_ID ] = htmlspecialchars( $this->id);
		}

		if ( !empty( $this->classes ) ) {
			$allAttributes[ self::ATTRIBUTE_CLASS ] = implode( ' ', $this->classes );
		}

		if ( !empty( $this->styles ) ) {
			$allAttributes[ self::ATTRIBUTE_STYLE ] = $this->getComputedCSSStyle();
		}

		foreach ( $this->attributes as $attributeName => $attributeValue ) {
			$allAttributes[ htmlspecialchars($attributeName) ] = htmlspecialchars($attributeValue);
		}

		$allAttributesFormatted = [];

		foreach ( $allAttributes as $attributeName => $attributeValue ) {
			$allAttributesFormatted[] = $attributeName  . ' = "' . $attributeValue . '"';
		}

		$a=1;

		return trim( implode( ' ', $allAttributesFormatted ) );

	}

	/**
	 * @return string
	 */
	private function __getContent()
	{
		$result = [];
		foreach ( $this->htmlElements as $htmlElement ) {
			if ( $htmlElement instanceof HtmlElementInterface )
				$result[] = $htmlElement->getHTMLMarkup();
			else
				$result[] = $htmlElement . $this->endLine ;
		}

		return implode( '', $result );
	}

	/**
	 * @return string
	 */
	private function __getStartTag()
	{
		$attributes = $this->__getAttributes();
		$a=1;
		if ( empty( $attributes ) ) {
			return '<' . $this->getHtmlTag() . '>' . $this->endLine ;
		}

		return '<' . $this->getHtmlTag() . ' ' . $attributes . '>' . $this->endLine ;
	}

	/**
	 * @return string
	 */
	private function __getEndTag()
	{
		if ( !$this->isContainer() ) {
			return '';
		}

		return  "</" . $this->getHtmlTag() . ">" . $this->endLine ;
	}

}