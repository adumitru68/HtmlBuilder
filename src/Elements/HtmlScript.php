<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 3/7/2019
 * Time: 11:07 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractResource;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class HtmlScript extends AbstractResource
{

	/**
	 * HtmlScript constructor.
	 * @param string|null $resourceUrl
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function __construct( $resourceUrl = null ) {
		parent::__construct( $resourceUrl );
		$this->src( $resourceUrl );
	}

	/**
	 * @param $text
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function jsCode( ...$text ) {
		$this->htmlElements[] = ( new HtmlPlainText() )->withPlainText( $text );

		return $this;
	}

	/**
	 * @param string $href
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function src( $href ) {
		$this->withAttribute( 'src', $href );

		return $this;
	}

	/**
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function defer() {
		$this->withAttribute( 'defer' );

		return $this;
	}

	/**
	 * @param string $charset
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function charset( $charset = 'UTF-8' ) {
		$this->withAttribute( 'charset', $charset );

		return $this;
	}

	/**
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function async() {
		$this->withAttribute( 'async' );

		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function type( $type = 'text/javascript' ) {
		$this->withAttribute( 'type', $type );

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'script';
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getMarkup() {
		if ( $this->version ) {
			$attributes = $this->getAttributes();
			if ( isset( $attributes[ 'src' ] ) ) {
				$versionSrc = $attributes[ 'src' ] . '?v=' . $this->version;
				$this->withAttribute( 'src', $versionSrc );
			}
		}

		return parent::getMarkup();
	}

}