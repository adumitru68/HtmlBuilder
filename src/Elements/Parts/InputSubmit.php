<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 4:42 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputSubmit extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'submit';
	}
}