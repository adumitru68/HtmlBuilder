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
		if ( function_exists( 'tidy_parse_string' ) && 1 === 1 ) {
			echo tidy_parse_string(
				$this->getHTMLMarkup(),
				array(
					'show-body-only' => true,
					'indent' => true,
					'wrap' => 1000,
					'drop-empty-elements' => false,
					'new-blocklevel-tags' => TagsCollection::getInstance()->getNewTags(true),
					'new-empty-tags' => TagsCollection::getInstance()->getNewClosedTags(true),
					'new-inline-tags' => TagsCollection::getInstance()->getNewInlineTags(true),
					'new-pre-tags' => '',
				)
			);
		}
		else {
			echo $this->getHTMLMarkup();
		}

	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	private function getHtmlElementContent()
	{
		$result = [];
		foreach ( $this->htmlElements as $htmlElement ) {
			if ( $htmlElement instanceof HtmlElementInterface )
				$result[] = $htmlElement->getHTMLMarkup();
			elseif (is_string($htmlElement))
				$result[] = $htmlElement . $this->endLine;
			else
				throw new HtmlBuilderException('Invalid html content. Accepted only instanceof HtmlElementInterface and String');
		}

		return implode( '', $result );
	}

	/**
	 * @return string
	 */
	private function getHtmlElementStartTag()
	{
		$attributes = $this->getComputedAttributes();

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


}