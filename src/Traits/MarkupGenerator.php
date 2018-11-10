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
	 * @var string
	 */
	protected $endLine = '';

	/**
	 * @var array
	 */
	protected $specialAttributes = [
		HtmlElementInterface::ATTRIBUTE_ID,
		HtmlElementInterface::ATTRIBUTE_CLASS,
		HtmlElementInterface::ATTRIBUTE_STYLE
	];


	/**
	 * @return string
	 */
	public function getHTMLMarkup()
	{

		if ( !$this instanceof AbstractHtmlElement ) {
			return '';
		}

		$content = $this->isContainer() ? $this->getHtmlElementContent() : '';

		if ( !empty( $this->getHtmlTag() ) ) {
			$content = $this->getHtmlElementStartTag() . $content . $this->getHtmlElementEndTag();
		}

		return $content;

	}

	/**
	 * Display Html content
	 */
	public function render()
	{
		if(function_exists('tidy_parse_string')) {
			echo tidy_parse_string($this->getHTMLMarkup(), array('show-body-only'=>true, 'indent'=>true, 'wrap'=> 200));
		} else {
			echo $this->getHTMLMarkup();
		}

	}

	/**
	 * @return string
	 */
	private function getHtmlElementAttributes()
	{
		$allAttributes = [];

		foreach ( $this->attributes as $attributeName => $attributeValue ) {

			if ( empty( $attributeValue ) && in_array( $attributeName, $this->specialAttributes ) ) {
				continue;
			}

			if ( $attributeName == HtmlElementInterface::ATTRIBUTE_CLASS ) {
				$attributeValue = implode( ' ', $attributeValue );
			}

			if ( $attributeName == HtmlElementInterface::ATTRIBUTE_STYLE ) {
				$attributeValue = $this->getComputedCSSStyle();
			}

			$allAttributes[ htmlspecialchars( $attributeName ) ] = htmlentities( $attributeValue );
		}

		$allAttributesFormatted = [];

		foreach ( $allAttributes as $attributeName => $attributeValue ) {
			$allAttributesFormatted[] = $attributeName . ' = "' . $attributeValue . '"';
		}

		return trim( implode( ' ', $allAttributesFormatted ) );

	}

	/**
	 * @return string
	 */
	private function getHtmlElementContent()
	{
		$result = [];
		foreach ( $this->htmlElements as $htmlElement ) {
			if ( $htmlElement instanceof HtmlElementInterface )
				$result[] = $htmlElement->getHTMLMarkup();
			else
				$result[] = $htmlElement . $this->endLine;
		}

		return implode( '', $result );
	}

	/**
	 * @return string
	 */
	private function getHtmlElementStartTag()
	{
		$attributes = $this->getHtmlElementAttributes();

		if ( empty( $attributes ) ) {
			return '<' . $this->getHtmlTag() . '>' . $this->endLine;
		}

		return '<' . $this->getHtmlTag() . ' ' . $attributes . '>' . $this->endLine;
	}

	/**
	 * @return string
	 */
	private function getHtmlElementEndTag()
	{
		if ( !$this->isContainer() ) {
			return '';
		}

		return "</" . $this->getHtmlTag() . ">" . $this->endLine;
	}

	/**
	 * @return string
	 */
	protected function getComputedCSSStyle()
	{
		$result = [];
		foreach ( $this->attributes[ HtmlElementInterface::ATTRIBUTE_STYLE ] as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}
}