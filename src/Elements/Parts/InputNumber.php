<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/8/2019
 * Time: 10:09 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputNumber extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'number';
	}
}

