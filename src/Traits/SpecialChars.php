<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/9/2018
 * Time: 11:52 AM
 */

namespace Qpdb\HtmlBuilder\Traits;


trait SpecialChars
{

	protected $singleQuote = "'";
	protected $doubleQuote = '"';

	/**
	 * @param string $string
	 * @param bool   $forcedClean
	 * @return string
	 */
	protected function getSafeHtmlString( $string, $forcedClean = false ) {
		if($forcedClean) {
			return htmlspecialchars($string);
		}
		switch ( true ) {
			case true === strpos( $string, $this->doubleQuote ) && true === strpos( $string, $this->singleQuote ):
				return $this->doubleQuote . htmlspecialchars( $string ) . $this->doubleQuote;
			case true === strpos( $string, $this->doubleQuote ):
				return $this->singleQuote . $string . $this->singleQuote;
			default:
				return $this->doubleQuote . $string . $this->doubleQuote;
		}
	}

	protected function htmlSpecialChars($string) {

	}


}