<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 1:18 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractCheck;

class InputCheckbox extends AbstractCheck
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'checkbox';
	}
}