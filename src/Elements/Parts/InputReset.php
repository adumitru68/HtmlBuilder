<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 4:44 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputReset extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'reset';
	}
}