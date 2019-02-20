<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 4:58 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;

abstract class AbstractCheck extends AbstractInput
{

	/**
	 * @param bool $checked
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function checked( $checked = true ) {
		if ( $checked ) {
			$this->withAttribute( ConstHtml::ATTRIBUTE_CHECKED );
		} else {
			$this->withOutAttribute( ConstHtml::ATTRIBUTE_CHECKED );
		}

		return $this;
	}


}