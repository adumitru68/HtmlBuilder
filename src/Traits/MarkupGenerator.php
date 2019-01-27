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
use Qpdb\HtmlBuilder\Helper\TagsCollection;
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


	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function getMarkup() {

		if ( $this->isInlineTag() ) {
			$this->endLine = '';
		}

		$content = $this->isSelfClosed() ? '' : $this->getHtmlElementContent();

		return $this->makeTag( $this->getComputedAttributes(), $content );
	}

	/**
	 * Display Html content
	 */
	public function render() {
		if ( function_exists( 'tidy_parse_string' ) && 1 === 1 ) {
			echo tidy_parse_string(
				$this->getMarkup(),
				array(
					'show-body-only' => true,
					'indent' => true,
					'wrap' => 1000,
					'drop-empty-elements' => false,
//					'new-blocklevel-tags' => TagsCollection::getInstance()->getNewTags( true ),
//					'new-empty-tags' => TagsCollection::getInstance()->getNewClosedTags( true ),
//					'new-inline-tags' => TagsCollection::getInstance()->getNewInlineTags( true ),
//					'new-pre-tags' => '',
				)
			);
		} else {
			echo $this->getMarkup();
		}

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

		$formattedTag = "<{$tag}";
		$formattedTag .= empty( $attributes ) ? '>' : " {$attributes}>";
		$formattedTag .= $this->endLine;
		$formattedTag .= $content;
		$formattedTag .= $this->endLine;
		$formattedTag .= "</{$tag}>";

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