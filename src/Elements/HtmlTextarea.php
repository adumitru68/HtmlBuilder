<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/25/2018
 * Time: 11:31 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlTextarea extends AbstractHtmlElement implements HtmlElementInterface
{
	use MarkupGenerator;

	/**
	 * @return bool
	 */
	public function isSelfClosed() {
		return false;
	}

	/**
	 * @param string $value
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withValue( $value ) {
		$this->attributes->withAttribute( ConstHtml::ATTRIBUTE_VALUE, $value );

		return $this;
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function getMarkup() {
		$attributes = $this->attributes->toArray();
		$content = '';
		if ( !empty( $attributes[ ConstHtml::ATTRIBUTE_VALUE ] ) ) {
			$content = $attributes[ ConstHtml::ATTRIBUTE_VALUE ];
		}
		$this->attributes->deleteAttribute( ConstHtml::ATTRIBUTE_VALUE );

		return $this->makeTag( $this->getComputedAttributes(), $content );
	}

	/**
	 * @return string||null
	 */
	public function getTag() {
		return 'textarea';
	}
}