<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/30/2018
 * Time: 11:18 PM
 */

namespace Qpdb\HtmlBuilder\Traits;


use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\HtmlDef;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

/**
 * Trait MakeAttributes
 * @package Qpdb\HtmlBuilder\Traits
 * @var AbstractHtmlElement $this
 */
trait MakeAttributes
{

	/**
	 * @param $id string
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withId( $id )
	{
		if ( !is_string( $id ) ) {
			throw new HtmlBuilderException( "Invalid argument id" );
		}

		$this->attributes[ HtmlElementInterface::ATTRIBUTE_ID ] = $id;

		return $this;
	}


	/**
	 * @param string ...$classes
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withClass( ...$classes )
	{
		foreach ( $classes as $class ) {

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

		}

		return $this;
	}

	/**
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withCssProperty( $propertyName, $propertyValue )
	{
		$propertyName = trim( (string)$propertyName );
		$propertyValue = trim( (string)$propertyValue );

		if ( empty( $propertyName ) ) {
			throw new HtmlBuilderException( 'Invalid style property name' );
		}

		if ( empty( $propertyValue ) ) {
			throw new HtmlBuilderException( 'Invalid style property value' );
		}

		$this->attributes[ HtmlElementInterface::ATTRIBUTE_STYLE ][ $propertyName ] = $propertyValue;

		return $this;
	}

	/**
	 * @param string $cssStyle
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withCssStyle( $cssStyle )
	{
		if ( !is_string( $cssStyle ) ) {
			throw new HtmlBuilderException( 'Invalid style expression' );
		}
		$cssStyle = Strings::removeMultipleSpace( $cssStyle );
		$cssStyleArray = explode( ';', $cssStyle );
		foreach ( $cssStyleArray as $prop ) {
			$property = explode( ':', $prop );
			if ( count( $property ) !== 2 ) {
				continue;
			}
			$this->withCssProperty( $property[ 0 ], $property[ 1 ] );
		}

		return $this;
	}

	/**
	 * @param string $attributeName
	 * @param string|null $attributeValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withAttribute( $attributeName, $attributeValue = null )
	{

		$this->validateAttributeName( $attributeName );
		$this->validateAttributeValue( $attributeValue );

		$attributeName = trim( strtolower( $attributeName ) );

		switch ( $attributeName ) {
			case HtmlDef::ATTRIBUTE_CLASS:
				return $this->withClass( $attributeValue );
			case HtmlDef::ATTRIBUTE_STYLE:
				return $this->withCssStyle( $attributeValue );
		}

		$this->attributes[ $attributeName ] = $attributeValue;

		return $this;
	}


	/**
	 * @return string
	 */
	protected function getComputedAttributes()
	{

		$this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ] = array_values( array_unique( $this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ] ) );
		$allAttributes = [];
		foreach ( $this->attributes as $name => $value ) {
			switch ( $name ) {
				case HtmlDef::ATTRIBUTE_ID:
				case HtmlDef::ATTRIBUTE_NAME:
					if ( empty( $value ) ) {
						continue;
					}
					$allAttributes[] = $name . ' = "' . htmlspecialchars( $value ) . '"';
					break;
				case HtmlDef::ATTRIBUTE_CLASS:
					if ( empty( $value ) ) {
						continue;
					}
					$allAttributes[] = $name . ' = "' . htmlspecialchars( implode( ' ', $this->attributes[ HtmlDef::ATTRIBUTE_CLASS ] ) ) . '"';
					break;
				case HtmlDef::ATTRIBUTE_STYLE:
					if ( empty( $value ) ) {
						continue;
					}
					$allAttributes[] = $name . ' = "' . htmlspecialchars($this->getComputedCSSStyle()) . '"';
					break;
				default:
					$allAttributes[]  = (null === $value) ? $name : empty($value) ? $name . ' = ""' : $name . ' = "' . htmlspecialchars($value) . '"';
					break;
			}
		}

		return implode(' ', $allAttributes);
	}

	/**
	 * @return string
	 */
	private function getComputedCSSStyle()
	{
		$result = [];
		foreach ( $this->attributes[ HtmlElementInterface::ATTRIBUTE_STYLE ] as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}


	/**
	 * @param string $classes
	 */
	private function addClassesByString( $classes )
	{
		$classes = str_ireplace( [ ',', ';' ], ' ', $classes );
		$classes = Strings::removeMultipleSpace( $classes );
		foreach ( explode( ' ', $classes ) as $item ) {
			if ( empty( $item ) ) {
				continue;
			}
			$this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ][] =  $item ;
		}
	}

	/**
	 * @param array $classes
	 * @throws HtmlBuilderException
	 */
	private function addClassesByArray( Array $classes )
	{
		foreach ( $classes as $class ) {
			if ( is_array( $class ) ) {
				$this->addClassesByArray( $class );
			}
			else {
				if ( empty( $class ) ) {
					continue;
				}
				$this->withClass( $class );
			}
		}
	}

	/**
	 * @param $attributeName
	 * @throws HtmlBuilderException
	 */
	private function validateAttributeName( $attributeName )
	{
		if ( !is_string( $attributeName ) ) {
			throw new HtmlBuilderException( 'Invalid attribute name. It must be string.' );
		}

		if ( empty( trim( $attributeName ) ) ) {
			throw new HtmlBuilderException( 'Invalid attribute name. It is empty' );
		}

		if ( $attributeName !== htmlspecialchars( $attributeName ) ) {
			throw new HtmlBuilderException( 'Invalid attribute name: ' . $attributeName );
		}
	}

	/**
	 * @param $attributeValue
	 * @throws HtmlBuilderException
	 */
	private function validateAttributeValue( $attributeValue )
	{
		if ( null !== $attributeValue && !is_string( $attributeValue ) ) {
			throw new HtmlBuilderException( 'Invalid attribute value. It must be string.' );
		}
	}


}