<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:41 PM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;

class DatalistOption extends AbstractHtmlElement
{

	/**
	 * DatalistOption constructor.
	 * @param null $value
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function __construct( $value = null ) {
		parent::__construct();
		$this->value($value);
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function value( $value ) {
		$this->withAttribute( 'value', $value );

		return $this;
	}

	/**
	 * @param $label
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function label( $label ) {
		$this->withAttribute( 'label', $label );

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSelfClosed() {
		return true;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'option';
	}
}