<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/19/2019
 * Time: 2:14 AM
 */

namespace Qpdb\HtmlBuilder\Helper;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class HtmlHelper
{

	protected static $singleQuote = "'";
	protected static $doubleQuote = '"';

    /**
     * @param string $name
     * @return bool
     * @throws HtmlBuilderException
     */
	public static function validateNameOfAttribute( $name ) {
		if ( !is_string( $name ) ) {
			throw new HtmlBuilderException( 'Name of attribute not is string' );
		}
		if ( !preg_match( '/^[a-zA-Z0-9_-]+$/', $name ) ) {
			throw new HtmlBuilderException( 'Invalid name of attribute: ' . $name );
		}

		return true;
	}

	/**
	 * @param string $attribute
	 * @return bool
	 */
	public static function isDataAttribute( $attribute ) {
		$attribute = explode( '-', $attribute );
		if ( $attribute[ 0 ] === 'data' && count( $attribute ) > 1 ) {
			return true;
		}

		return false;
	}

	/**
	 * @param string $style
	 * @return array
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public static function parseInLineStyle( $style ) {
		$style = Strings::toString($style);
		$properties = [];
		$style = Strings::removeMultipleSpace( $style, true );
		$style = explode( ';', $style );
		foreach ( $style as $item ) {
			$item = trim( $item );
			if ( '' === $item )
				continue;
			$prop = explode( ':', $item );
			if ( count( $prop ) < 2 )
				continue;
			$propName = trim( $prop[ 0 ] );
			$propValue = trim( $prop[ 1 ] );
			if ( Strings::isEmpty( $propName ) || Strings::isEmpty( $propValue ) )
				continue;

			$properties[ $propName ] = $propValue;
		}

		return $properties;
	}

	/**
	 * @param string $string
	 * @param bool   $forcedClean
	 * @return string
	 */
	public static function getSafeHtmlString( $string, $forcedClean = false ) {

		if ( $forcedClean ) {
			return htmlspecialchars( $string );
		}

		switch ( true ) {
			case false !== strpos( $string, self::$doubleQuote ) && false !== strpos( $string, self::$singleQuote ):
				return self::$doubleQuote . self::htmlSpecialChars( $string ) . self::$doubleQuote;
			case false !== strpos( $string, self::$doubleQuote ):
				return self::$singleQuote . $string . self::$singleQuote;
			default:
				return self::$doubleQuote . $string . self::$doubleQuote;
		}
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public static function htmlSpecialChars( $string ) {
		return htmlspecialchars( $string );
	}

}