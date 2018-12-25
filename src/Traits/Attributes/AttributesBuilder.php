<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/22/2018
 * Time: 2:15 PM
 */

namespace Qpdb\HtmlBuilder\Traits\Attributes;

use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Elements\TagAttributes;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;

/**
 * Trait AttributesBuilder
 * @package Qpdb\HtmlBuilder\Traits\Attributes
 * @var TagAttributes $this
 */
trait AttributesBuilder
{
	/**
	 * @param array $classes
	 * @throws HtmlBuilderException
	 */
	protected function addClassesByArray( Array $classes ) {
		foreach ( $classes as $class ) {
			if ( is_array( $class ) ) {
				$this->addClassesByArray( $class );
			} else {
				if ( empty( $class ) ) {
					continue;
				}
				$this->addClass( $class );
			}
		}
	}

	/**
	 * @param string|array $class
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	protected function addClass( $class ) {

		switch ( true ) {
			case empty( $class ):
				continue;
				break;
			case is_array( $class ):
				$this->addClassesByArray( $class );
				break;
			case is_string( $class ):
				$this->addClassesByString( $class );
				break;
			default:
				throw new HtmlBuilderException( 'Invalid argument class type' );
		}

		return $this;
	}

	/**
	 * @param string $classes
	 */
	protected function addClassesByString( $classes ) {
		$classes = str_ireplace( [ ',', ';' ], ' ', $classes );
		$classes = Strings::removeMultipleSpace( $classes );
		foreach ( explode( ' ', $classes ) as $item ) {
			if ( empty( $item ) ) {
				continue;
			}
			$this->attributes[ ConstHtml::ATTRIBUTE_CLASS ][] = $item;
		}
	}


	/**
	 * @param array $style
	 * @return string
	 */
	protected function getComputedCSSStyle( $style ) {
		$result = [];
		foreach ( $style as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}

	protected function addStyle( $cssStyle ) {
		$this->validateValueOfAttribute( $cssStyle );
		$cssStyle = Strings::removeMultipleSpace( $cssStyle );
		$cssStyleArray = explode( ';', $cssStyle );
		foreach ( $cssStyleArray as $prop ) {
			$property = explode( ':', $prop );
			if ( count( $property ) !== 2 ) {
				continue;
			}
			$this->addCssProperty( $property[ 0 ], $property[ 1 ] );
		}
	}

	/**
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	protected function addCssProperty( $propertyName, $propertyValue ) {

		$propertyName = trim( (string)$propertyName );
		$propertyValue = trim( (string)$propertyValue );

		if ( empty( $propertyName ) ) {
			throw new HtmlBuilderException( 'Invalid style property name' );
		}

		if ( empty( $propertyValue ) ) {
			throw new HtmlBuilderException( 'Invalid style property value' );
		}

		$this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $propertyName ] = $propertyValue;

		return $this;
	}
}