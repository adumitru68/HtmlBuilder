<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 1:19 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractCheckOrRadio;

class InputRadio extends AbstractCheckOrRadio
{

	/**
	 * @return string
	 */
	public function getType() {
		return 'radio';
	}
}