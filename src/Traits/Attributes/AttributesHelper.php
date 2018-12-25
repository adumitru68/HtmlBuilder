<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/22/2018
 * Time: 2:57 PM
 */

namespace Qpdb\HtmlBuilder\Traits\Attributes;

use Qpdb\HtmlBuilder\Elements\TagAttributes;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

/**
 * Class AttributesHelper
 * @package Qpdb\HtmlBuilder\Traits\Attributes
 * @var TagAttributes $this
 */
trait AttributesHelper
{

	protected $singleQuote = "'";
	protected $doubleQuote = '"';


	/**
	 * @param string $name
	 * @throws HtmlBuilderException
	 */
	protected function validateNameOfAttribute( $name ) {
		if ( !is_string( $name ) ) {
			throw new HtmlBuilderException( 'It not is string' );
		}
		if ( !preg_match( '/^[a-zA-Z0-9_-]+$/', $name ) ) {
			throw new HtmlBuilderException( 'Invalid name of attribute: ' . $name );
		}
	}

	/**
	 * @param string $value
	 * @throws HtmlBuilderException
	 */
	protected function validateValueOfAttribute( $value ) {
		if ( !is_string( $value ) ) {
			throw new HtmlBuilderException( 'It not is string' );
		}
	}

	/**
	 * @param string $attribute
	 * @return bool
	 */
	protected function isDataAttribute( $attribute ) {
		$attribute = explode( '-', $attribute );
		if ( $attribute[ 0 ] === 'data' && count( $attribute ) > 1 ) {
			return true;
		}

		return false;
	}

	/**
	 * @param string $string
	 * @param bool   $forcedClean
	 * @return string
	 */
	protected function getSafeHtmlString( $string, $forcedClean = false ) {
		if ( $forcedClean ) {
			return htmlspecialchars( $string );
		}
		switch ( true ) {
			case false !== strpos( $string, $this->doubleQuote ) && false !== strpos( $string, $this->singleQuote ):
				return $this->doubleQuote . htmlspecialchars( $string ) . $this->doubleQuote;
			case false !== strpos( $string, $this->doubleQuote ):
				return $this->singleQuote . $string . $this->singleQuote;
			default:
				return $this->doubleQuote . $string . $this->doubleQuote;
		}
	}

	protected function htmlSpecialChars( $string ) {
		return htmlspecialchars( $string );
	}


}