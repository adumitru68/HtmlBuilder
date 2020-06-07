<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 2:03 AM
 */

namespace Qpdb\HtmlBuilder\Traits;

use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

/**
 * Trait MarkupGenerator
 * @package Qpdb\HtmlBuilder\Traits
 * @var  $this AbstractHtmlElement
 */
trait MarkupGenerator
{

	/**
	 * @var string
	 */
	protected $endLine = PHP_EOL;

	protected $newLine = '';


	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function getMarkup() {

		if ( $this->isInlineTag() ) {
			$this->endLine = '';
		}

		if($this->isNewLineTag()){
			$this->newLine = PHP_EOL;
		}

		$content = $this->isSelfClosed() ? '' : $this->getHtmlElementContent();

		return $this->makeTag( $this->getComputedAttributes(), $content );
	}

	/**
	 * Display Html content
	 * @throws HtmlBuilderException
	 */
	public function output() {
		echo $this->getMarkup();
	}

	private function makeTag( $attributes, $content = '' ) {

		$tag = $this->getTag();
		$attributes = trim( $attributes );

		if ( $this->isSelfClosed() ) {
			return $this->makeTagSelf( $attributes );
		}

		if ( empty( $tag ) ) {
			return $content;
		}

		$formattedTag = $this->newLine . "<{$tag}";
		$formattedTag .= empty( $attributes ) ? '>' : " {$attributes}>";
		$formattedTag .= empty($this->getChildren()) ? '' : $this->endLine;
		$formattedTag .= $content;
		$formattedTag .= empty($this->getChildren()) ? '' : $this->endLine;
		$formattedTag .= "</{$tag}>";
		$formattedTag .= $this->endLine;

		return $formattedTag;
	}

	/**
	 * @param $attributes
	 * @return string
	 */
	private function makeTagSelf( $attributes ) {

		$tag = $this->getTag();

		if ( empty( $tag ) ) {
			return '';
		}

		$formattedTag = $this->endLine . "<{$tag}";
		$formattedTag .= empty( $attributes ) ? '>' : " {$attributes}>";

		return $formattedTag;
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	private function getHtmlElementContent() {
		$result = [];
		foreach ( $this->htmlElements as $htmlElement ) {
			if ( $htmlElement instanceof HtmlElementInterface )
				$result[] = $htmlElement->getMarkup();
			else
				throw new HtmlBuilderException( 'Invalid html content. Accepted only instanceof HtmlElementInterface' );
		}

		return implode( '', $result );
	}


}