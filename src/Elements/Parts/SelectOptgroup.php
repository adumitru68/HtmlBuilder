<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/2/2019
 * Time: 3:15 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractOptionsContainer;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class SelectOptgroup extends AbstractOptionsContainer
{

	/**
	 * @param string $label
	 * @return SelectOptgroup
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function label( $label ) {
		return $this->withAttribute( 'label', $label );
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'optgroup';
	}
}