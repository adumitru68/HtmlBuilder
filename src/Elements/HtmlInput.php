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
use Qpdb\HtmlBuilder\Elements\Parts\InputPassword;
use Qpdb\HtmlBuilder\Elements\Parts\InputRadio;
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

}