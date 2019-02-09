<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 10:13 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputDate extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'date';
	}
}