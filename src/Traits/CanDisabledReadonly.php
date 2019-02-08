<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/7/2019
 * Time: 10:07 PM
 */

namespace Qpdb\HtmlBuilder\Traits;

use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Helper\ConstHtml;

/**
 * Trait CanDisabledReadonly
 * @package Qpdb\HtmlBuilder\Traits
 * @var $this AbstractHtmlElement
 */
trait CanDisabledReadonly
{

	/**
	 * @param bool $disabled
	 * @return $this
	 */
	public function disabled( $disabled = true ) {
		if ( $disabled ) {
			$this->withAttribute( ConstHtml::ATTRIBUTE_DISABLED );
		} else {
			$this->withOutAttribute( ConstHtml::ATTRIBUTE_DISABLED );
		}

		return $this;
	}

	/**
	 * @param bool $readonly
	 * @return $this
	 */
	public function readonly( $readonly = true ) {
		if ( $readonly ) {
			$this->withAttribute( ConstHtml::ATTRIBUTE_READONLY );
		} else {
			$this->withOutAttribute( ConstHtml::ATTRIBUTE_READONLY);
		}

		return $this;
	}

}