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
	 * @param $name
	 * @return AbstractInput
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function name( $name ) {
		return $this->withAttribute( ConstHtml::ATTRIBUTE_NAME, $name );
	}

	/**
	 * @param string $value
	 * @return AbstractInput
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function value( $value ) {
		return $this->withAttribute( ConstHtml::ATTRIBUTE_VALUE, $value );
	}

	/**
	 * @param $placeholder
	 * @return AbstractInput
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function withPlaceholder($placeholder) {
		return $this->withAttribute(ConstHtml::ATTRIBUTE_PLACEHOLDER, $placeholder);
	}

	/**
	 * @return string
	 */
	abstract public function getType();

	/**
	 * @return string
	 */
	public function getTag() {
		return 'input';
	}
}