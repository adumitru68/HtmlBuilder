<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/8/2019
 * Time: 9:47 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputColor extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'color';
	}
}