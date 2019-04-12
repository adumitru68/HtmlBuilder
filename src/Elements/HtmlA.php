<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 12:25 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlA extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * HtmlA constructor.
	 * @param null $label
	 * @throws HtmlBuilderException
	 */
	public function __construct( $label = null ) {
		parent::__construct();
		$this->withPlainText( $label );
	}

	/**
	 * @param $url
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function href( $url ) {
		$this->withAttribute( 'href', $url );

		return $this;
	}

	/**
	 * @param mixed ...$label
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function label( ...$label ) {
		$this->withPlainText( $label );

		return $this;
	}

	/**
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function targetSelf() {
		$this->withAttribute( 'target', '_self' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function targetBlank() {
		$this->withAttribute( 'target', '_blank' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function targetParent() {
		$this->withAttribute( 'target', '_parent' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function targetTop() {
		$this->withAttribute( 'target', '_top' );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'a';
	}
}