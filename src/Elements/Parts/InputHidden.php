<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/8/2019
 * Time: 11:16 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputHidden extends AbstractInput
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'hidden';
	}
}