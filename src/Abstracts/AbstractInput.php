<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 4:27 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Traits\CanDisabledReadonly;

abstract class AbstractInput extends AbstractHtmlElement
{

	use CanDisabledReadonly;

	/**
	 * AbstractInput constructor.
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function __construct() {
		parent::__construct();
		$this->withAttribute( 'type', $this->getType() );
	}

	/**
	 * @return string
	 */
	abstract public function getType();

	/**
	 * @param $name
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function name( $name ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_NAME, $name );

		return $this;
	}

	/**
	 * @param string $value
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function value( $value ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_VALUE, $value );

		return $this;
	}

	/**
	 * @param string $datalistId
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function datalist( $datalistId ) {
		$this->withAttribute( 'list', $datalistId );

		return $this;
	}

	/**
	 * @param $placeholder
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function placeholder( $placeholder ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_PLACEHOLDER, $placeholder );

		return $this;
	}

	/**
	 * @param $length
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function maxLength( $length ) {
		$this->withAttribute( 'maxlength', $length );

		return $this;
	}

	/**
	 * @param $length
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function minLength( $length ) {
		$this->withAttribute( 'minlength', $length );

		return $this;
	}

	/**
	 * @param $min
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function min( $min ) {
		$this->withAttribute( 'min', $min );

		return $this;
	}

	/**
	 * @param $max
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function max( $max ) {
		$this->withAttribute( 'max', $max );

		return $this;
	}

	/**
	 * @param $step
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function step( $step ) {
		$this->withAttribute( 'step', $step );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'input';
	}
}