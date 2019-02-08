<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/8/2019
 * Time: 11:41 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlButton extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function typeButton() {
		$this->withAttribute( 'type', 'button' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function typeSubmit() {
		$this->withAttribute( 'type', 'submit' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function typeReset() {
		$this->withAttribute( 'type', 'reset' );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'button';
	}
}