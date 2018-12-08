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
 * @var AbstractHtmlElement $this
 */
trait MarkupGenerator
{

	/**
	 * @var string
	 */
	protected $endLine = '';


	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function getHTMLMarkup() {

		$content = $this->isSelfClosed() ? '' : $this->getHtmlElementContent();
		$attributes = $this->getComputedAttributes();

		return $this->makeTag($attributes, $content);
	}

	/**
	 * Display Html content
	 */
	public function render() {
		if ( function_exists( 'tidy_parse_string' ) && 1 === 1 ) {
			echo tidy_parse_string(
				$this->getHTMLMarkup(),
				array(
					'show-body-only' => true,
					'indent' => true,
					'wrap' => 1000,
					'drop-empty-elements' => false,
					'new-blocklevel-tags' => TagsCollection::getInstance()->getNewTags( true ),
					'new-empty-tags' => TagsCollection::getInstance()->getNewClosedTags( true ),
					'new-inline-tags' => TagsCollection::getInstance()->getNewInlineTags( true ),
					'new-pre-tags' => '',
				)
			);
		} else {
			echo $this->getHTMLMarkup();
		}

	}

	private function makeTag( $attributes, $content = '' ) {

		$tag = $this->getHtmlTag();
		$attributes = trim( $attributes );

		if ( $this->isSelfClosed() ) {
			return $this->makeTagSelf( $content );
		}

		if ( empty( $tag ) ) {
			return $content;
		}

		$formattedTag = "<{$tag}";
		$formattedTag .= empty( $attributes ) ? '>' : " {$attributes}>";
		$formattedTag .= $content;
		$formattedTag .= "</{$tag}>";

		return $formattedTag;
	}

	/**
	 * @param $tag
	 * @param $attributes
	 * @return string
	 */
	private function makeTagSelf( $attributes ) {

		$tag = $this->getHtmlTag();

		if ( empty( $tag ) ) {
			return '';
		}

		$formattedTag = "<{$tag}";
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
				$result[] = $htmlElement->getHTMLMarkup();
			elseif ( is_string( $htmlElement ) )
				$result[] = $htmlElement . $this->endLine;
			else
				throw new HtmlBuilderException( 'Invalid html content. Accepted only instanceof HtmlElementInterface and String' );
		}

		return implode( '', $result );
	}


}