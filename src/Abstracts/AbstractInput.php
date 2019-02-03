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

abstract class AbstractInput extends AbstractHtmlElement
{

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
	public function withName( $name ) {
		return $this->withAttribute( ConstHtml::ATTRIBUTE_NAME, $name );
	}

	/**
	 * @param string $value
	 * @return AbstractInput
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function withValue( $value ) {
		return $this->withAttribute( ConstHtml::ATTRIBUTE_VALUE, $value );
	}

	/**
	 * @param bool $disabled
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function disabled( $disabled = true ) {
		if ( $disabled ) {
			$this->withAttribute( ConstHtml::ATTRIBUTE_DISABLED );
		} else {
			$this->withOutAttribute( ConstHtml::ATTRIBUTE_DISABLED );
		}

		return $this;
	}

	/**
	 * @param bool $readonly
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function readonly( $readonly = true ) {
		if ( $readonly ) {
			$this->withAttribute( ConstHtml::ATTRIBUTE_READONLY );
		} else {
			$this->withOutAttribute( ConstHtml::ATTRIBUTE_READONLY);
		}

		return $this;
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