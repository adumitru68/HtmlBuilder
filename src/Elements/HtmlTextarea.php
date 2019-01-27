<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/26/2019
 * Time: 10:44 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class HtmlTextarea extends AbstractHtmlElement
{

	/**
	 * @param $text
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withPlainText( $text ) {
		$this->htmlElements[] = HtmlPlainText::create()->withPlainText( $text );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'textarea';
	}
}