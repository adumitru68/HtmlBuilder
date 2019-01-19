<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/19/2019
 * Time: 1:30 AM
 */

namespace Qpdb\HtmlBuilder\Elements\Parts;


use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Helper\HtmlHelper;
use Qpdb\HtmlBuilder\Interfaces\TagAttributesInterface;

class TagAttributes implements TagAttributesInterface
{

	const ATTRIBUTES_ALL = '*';

	/**
	 * @var array
	 */
	private $attributes = [
		ConstHtml::ATTRIBUTE_ID => null,
		ConstHtml::ATTRIBUTE_NAME => null,
		ConstHtml::ATTRIBUTE_VALUE => null,
		ConstHtml::ATTRIBUTE_SRC => null,
		ConstHtml::ATTRIBUTE_CLASS => [],
		ConstHtml::ATTRIBUTE_STYLE => [],
	];

	/**
	 * @param string       $attributeName
	 * @param string|array $attributeValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withAttribute( $attributeName, $attributeValue ) {

		HtmlHelper::validateNameOfAttribute( $attributeName );
		switch ( $attributeName ) {
			case ConstHtml::ATTRIBUTE_CLASS:
				$this->withClass( $attributeValue );
				break;
			case ConstHtml::ATTRIBUTE_STYLE:
				$this->withInLineStyle( $attributeValue );
				break;
			default:
				HtmlHelper::validateValueOfAttribute( $attributeValue );
				$this->attributes[ $attributeName ] = $attributeValue;
		}

		return $this;
	}

	/**
	 * @param string|array ...$classes
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withClass( ...$classes ) {

		$classes = Arrays::flatValues( $classes );
		foreach ( $classes as $class ) {
			$class = str_ireplace( [ ',', ';' ], ' ', $class );
			$class = Strings::removeMultipleSpace( $class, true );
			foreach ( explode( ' ', $class ) as $item ) {
				if ( Strings::isEmpty( $item ) ) {
					continue;
				}
				$this->attributes[ ConstHtml::ATTRIBUTE_CLASS ][] = $item;
			}
		}

		return $this;
	}

	/**
	 * @param string ...$styles
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withInLineStyle( ...$styles ) {

		$styles = Arrays::flatValues( $styles );

		foreach ( $styles as $style ) {
			$arrayProps = HtmlHelper::parseInLineStyle( $style );
			$this->withStyleProperties( $arrayProps );
		}

		return $this;
	}

	/**
	 * CSS properties array Ex: ['display' => 'block', 'property name' => 'property value' ...]
	 *
	 * @param array $propertiesArray
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withStyleProperties( array $propertiesArray ) {
		foreach ( $propertiesArray as $propertyName => $propertyValue ) {
			$this->withStyleProperty( $propertyName, $propertyValue );
		}

		return $this;
	}

	/**
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withStyleProperty( $propertyName, $propertyValue ) {
		HtmlHelper::validateNameOfAttribute( $propertyName );
		HtmlHelper::validateValueOfAttribute( $propertyValue );
		$this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $propertyName ] = $propertyValue;

		return $this;
	}

	/**
	 * @param string|array ...$attributeName
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withOutAttribute( ...$attributeName ) {

		$attributeNames = Arrays::flatValues( $attributeName );
		foreach ( $attributeNames as $attr ) {
			HtmlHelper::validateNameOfAttribute( $attr );
			switch ( $attributeName ) {
				case ConstHtml::ATTRIBUTE_CLASS:
				case ConstHtml::ATTRIBUTE_STYLE:
					$this->attributes[ $attr ] = [];
					break;
				default:
					if ( array_key_exists( $attr, $this->attributes ) ) {
						$this->attributes[ $attr ] = null;
					}
			}
		}

		return $this;
	}

	/**
	 * @param string|array ...$classes
	 * @return $this
	 */
	public function withOutClass( ...$classes ) {

		$classes = Arrays::flatValues( $classes );
		foreach ( $classes as $class ) {
			$class = str_ireplace( [ ',', ';' ], ' ', $class );
			$class = Strings::removeMultipleSpace( $class, true );
			$this->attributes[ ConstHtml::ATTRIBUTE_CLASS ] = Arrays::removeValues(
				$this->attributes[ ConstHtml::ATTRIBUTE_CLASS ],
				explode( ' ', $class ),
				true
			);
		}

		return $this;
	}

	/**
	 * @param string ...$propertyName
	 * @return $this
	 */
	public function withOutStyleProperty( ...$propertyName ) {

		$propertyNames = Arrays::flatValues( $propertyName );
		foreach ( $propertyNames as $property ) {
			if ( isset( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $property ] ) ) {
				unset( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $property ] );
			}
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getComputedClass() {
		return implode( ' ', $this->attributes[ ConstHtml::ATTRIBUTE_CLASS ] );
	}

	/**
	 * @return string
	 */
	public function getComputedStyle() {
		$result = [];
		foreach ( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ] as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}

	/**
	 * @return string
	 */
	public function getComputedAttributes() {
		$attributes = [];
		foreach ( $this->toArray() as $key => $value ) {
			switch ($key) {
				case ConstHtml::ATTRIBUTE_CLASS:
					$value = $this->getComputedClass();
					break;
				case ConstHtml::ATTRIBUTE_STYLE:
					$value = $this->getComputedStyle();
					break;
			}
			$value = trim( $value );
			$computed = $key;
			if ( !empty( $value ) ) {
				$computed .= ' = ' . HtmlHelper::getSafeHtmlString( $value );
			}
			$attributes[] = $computed;
		}

		return implode( ' ', $attributes );
	}

	/**
	 * @return array
	 */
	public function toArray() {
		$preparedArray = [];
		foreach ( $this->attributes as $key => $value ) {
			if ( null === $value || ( is_array( $value ) && empty( $value ) ) ) {
				continue;
			}
			switch ( $key ) {
				case ConstHtml::ATTRIBUTE_CLASS:
					$preparedArray[ $key ] = Arrays::flatValues( $value, true );
					break;
				default:
					$preparedArray[ $key ] = $value;
			}
		}

		return $preparedArray;
	}

	/**
	 * @return $this
	 */
	public function getClone() {
		return clone $this;
	}

	protected function toArrayValues( $arrayValues ) {
		return Arrays::flatValues( $arrayValues );
	}

}