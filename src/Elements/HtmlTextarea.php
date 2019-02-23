<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/26/2019
 * Time: 10:44 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;

class HtmlTextarea extends AbstractHtmlElement
{

	/**
	 * @param $text
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function text( ...$text ) {
		$this->htmlElements[] = ( new HtmlPlainText() )->withPlainText( $text );

		return $this;
	}

	/**
	 * @param $name
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function name( $name ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_NAME, $name );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'textarea';
	}
}