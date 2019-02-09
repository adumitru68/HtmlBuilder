<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 1:20 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Elements\Parts\InputButton;
use Qpdb\HtmlBuilder\Elements\Parts\InputCheckbox;
use Qpdb\HtmlBuilder\Elements\Parts\InputColor;
use Qpdb\HtmlBuilder\Elements\Parts\InputCustom;
use Qpdb\HtmlBuilder\Elements\Parts\InputDate;
use Qpdb\HtmlBuilder\Elements\Parts\InputHidden;
use Qpdb\HtmlBuilder\Elements\Parts\InputNumber;
use Qpdb\HtmlBuilder\Elements\Parts\InputPassword;
use Qpdb\HtmlBuilder\Elements\Parts\InputRadio;
use Qpdb\HtmlBuilder\Elements\Parts\InputRange;
use Qpdb\HtmlBuilder\Elements\Parts\InputReset;
use Qpdb\HtmlBuilder\Elements\Parts\InputSubmit;
use Qpdb\HtmlBuilder\Elements\Parts\InputText;

class HtmlInput
{

	/**
	 * @return InputText
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function text() {
		return new InputText();
	}

	/**
	 * @return InputCheckbox
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function checkbox() {
		return new InputCheckbox();
	}

	/**
	 * @return InputRadio
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function radio() {
		return new InputRadio();
	}

	/**
	 * @return InputPassword
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function password() {
		return new InputPassword();
	}

	/**
	 * @return InputButton
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function button() {
		return new InputButton();
	}

	/**
	 * @return InputSubmit
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function submit() {
		return new InputSubmit();
	}

	/**
	 * @return InputReset
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function reset() {
		return new InputReset();
	}

	/**
	 * @return InputColor
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function color() {
		return new InputColor();
	}

	/**
	 * @return InputNumber
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function number() {
		return new InputNumber();
	}

	/**
	 * @return InputRange
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function range() {
		return new InputRange();
	}

	/**
	 * @return InputHidden
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function hidden() {
		return new InputHidden();
	}

	/**
	 * @return InputDate
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function date() {
		return new InputDate();
	}

	/**
	 * @param $type
	 * @return InputCustom
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function other( $type ) {
		return new InputCustom( $type );
	}

}