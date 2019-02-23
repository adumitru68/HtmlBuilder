<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/2/2019
 * Time: 10:39 AM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Html;

class SelectOption extends AbstractHtmlElement
{

	/**
	 * @param string $labelText
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function label( $labelText ) {
		$this->htmlElements[] = Html::plainText( $labelText );

		return $this;
	}

	/**
	 * @param $value
	 * @return $this|SelectOption
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function value( $value ) {
		if ( null === $value ) {
			return $this;
		}

		return $this->withAttribute( ConstHtml::ATTRIBUTE_VALUE, $value );
	}


	/**
	 * @param bool $selected
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function selected( $selected = true ) {
		if ( $selected ) {
			$this->withAttribute( 'selected', null );
		} else {
			$this->withOutAttribute( 'selected' );
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'option';
	}
}