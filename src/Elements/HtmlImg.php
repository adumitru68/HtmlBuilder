<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/1/2019
 * Time: 10:38 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlImg extends AbstractHtmlElement
{
	/**
	 * @return string
	 */
	public function getTag() {
		return 'img';
	}

	/**
	 * @param $src
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\PrototypeException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function withSrc( $src ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_SRC, $src );

		return $this;
	}

	/**
	 * @param $alt
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\PrototypeException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function withAlt($alt) {
		$this->withAttribute(ConstHtml::ATTRIBUTE_ALT, $alt);

		return $this;
	}
}