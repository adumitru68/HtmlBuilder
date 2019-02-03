<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 4:31 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputPassword extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'password';
	}
}