<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 12:25 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlA extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * HtmlA constructor.
	 * @param null $label
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function __construct( $label = null ) {
		parent::__construct();
		$this->withPlainText( $label );
	}

	/**
	 * @param $url
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function href( $url ) {
		$this->withAttribute( 'href', $url );

		return $this;
	}

	/**
	 * @param mixed ...$label
	 * @return $this
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function label( ...$label ) {
		$this->withPlainText( $label );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function targetSelf() {
		$this->withAttribute( 'target', '_self' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function targetBlank() {
		$this->withAttribute( 'target', '_blank' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function targetParent() {
		$this->withAttribute( 'target', '_parent' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function targetTop() {
		$this->withAttribute( 'target', 'top' );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'a';
	}
}