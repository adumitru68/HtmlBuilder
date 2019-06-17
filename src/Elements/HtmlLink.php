<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 3/7/2019
 * Time: 10:47 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractResource;

class HtmlLink extends AbstractResource
{

	/**
	 * HtmlLink constructor.
	 * @param null $resourceUrl
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function __construct( $resourceUrl = null ) {
		parent::__construct( $resourceUrl );
		$this->href($resourceUrl);
	}

	/**
	 * @param string $rel
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function rel( $rel ) {
		$this->withAttribute( 'rel', $rel );

		return $this;
	}

	/**
	 * @param string $href
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function href( $href ) {
		$this->relStylesheet();
		$this->withAttribute( 'href', $href );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function relStylesheet() {
		$this->withAttribute( 'rel', 'stylesheet' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function relAlternate() {
		$this->withAttribute( 'rel', 'alternate' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function relNext() {
		$this->withAttribute( 'rel', 'next' );

		return $this;
	}

	/**
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function relPrev() {
		$this->withAttribute( 'rel', 'prev' );

		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function type( $type = 'text/css' ) {
		$this->withAttribute( 'type', $type );

		return $this;
	}


	/**
	 * @return string
	 */
	public function getTag() {
		return 'link';
	}

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function getMarkup() {
		if ( $this->version ) {
			$attributes = $this->getAttributes();
			if ( isset( $attributes[ 'href' ] ) ) {
				$versionSrc = $attributes[ 'href' ] . '?v=' . $this->version;
				$this->withAttribute( 'href', $versionSrc );
			}
		}

		return parent::getMarkup();
	}

}