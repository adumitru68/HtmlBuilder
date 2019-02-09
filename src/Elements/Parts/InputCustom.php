<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 9:13 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractInput;

class InputCustom extends AbstractInput
{

	/**
	 * @var string
	 */
	protected $inputType;

	public function __construct( $type ) {
		$this->inputType = $type;
		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->inputType;
	}
}