<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Helper\HtmlHelper;
use Qpdb\HtmlBuilder\Helper\TagsInformation;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;


abstract class AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator;

	/**
	 * @var string;
	 */
	protected $tag;

	/**
	 * @var HtmlElementInterface[]
	 */
	protected $htmlElements = [];
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
	 * AbstractHtmlElement constructor.
	 * @throws HtmlBuilderException
	 */
	public function __construct() {
		$this->checkTag();
	}

	/**
	 * @throws HtmlBuilderException
	 */
	protected function checkTag() {
		if ( TagsInformation::getInstance()->isTag( $this->getTag() ) || empty( $this->getTag() ) ) {
			$this->tag = $this->getTag();
		} else {
			throw new HtmlBuilderException( 'It not is html5 tag: ' . $this->getTag() );
		}
	}

	/**
	 * @return string
	 */
	abstract public function getTag();

	/**
	 * @return HtmlElementInterface[]
	 */
	public function getChildren() {
		return $this->htmlElements;
	}

	/**
	 * @param AbstractHtmlElement[] $children
	 * @return $this
	 */
	public function setChildren( $children ) {
		$this->htmlElements = $children;

		return $this;
	}


	/**
	 * @return array
	 */
	public function getAttributes() {
		return $this->getCleanAttributes();
	}

	/**
	 * @param $attributes
	 * @return $this
	 */
	public function setAttributes( $attributes ) {
		$this->attributes = array_merge( $this->attributes, $attributes );

		return $this;
	}

	/**
	 * @return array
	 */
	protected function getCleanAttributes() {
		$preparedArray = [];
		foreach ( $this->attributes as $key => $value ) {
			if ( null === $value || ( is_array( $value ) && empty( $value ) ) ) {
				continue;
			}
			switch ( $key ) {
				case ConstHtml::ATTRIBUTE_CLASS:
					$preparedArray[ $key ] = Arrays::flattenValues( $value, true );
					break;
				default:
					$preparedArray[ $key ] = $value;
			}
		}

		return $preparedArray;
	}

	/**
	 * @return bool
	 */
	public function isSelfClosed() {
		return TagsInformation::getInstance()->isSelfClosedTag( $this->tag );
	}

	/**
	 * @return bool
	 */
	public function isInlineTag() {
		if ( empty( $this->getTag() ) ) {
			return true;
		}

		return TagsInformation::getInstance()->isInlineTag( $this->getTag() );
	}

	/**
	 * @return bool
	 */
	public function isNewLineTag() {
		return TagsInformation::getInstance()->isNewLineTag( $this->getTag() );
	}

	/**
	 * @param $id
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function id( $id ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_ID, $id );

		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function title( $title ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_TITLE, $title );

		return $this;
	}

	/**
	 * @param $dataName
	 * @param $dataValue
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function data( $dataName, $dataValue = null ) {
		$dataName = 'data-' . $dataName;
		HtmlHelper::validateNameOfAttribute($dataName);
		if( HtmlHelper::isDataAttribute($dataName)) {
			$this->withAttribute( $dataName, $dataValue );
		} else {
			throw new HtmlBuilderException('Invalid data attribute');
		}


		return $this;
	}

	/**
	 * @param $attributeName
	 * @param $attributeValue
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function withAttribute( $attributeName, $attributeValue = null ) {

		HtmlHelper::validateNameOfAttribute( $attributeName );
		switch ( $attributeName ) {
			case ConstHtml::ATTRIBUTE_CLASS:
				$this->withClass( $attributeValue );
				break;
			case ConstHtml::ATTRIBUTE_STYLE:
				$this->withStyle( $attributeValue );
				break;
			default:
				$this->attributes[ $attributeName ] = Strings::toString( $attributeValue );
				break;
		}

		return $this;
	}

	/**
	 * @param string|array ...$classes
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withClass( ...$classes ) {

		$classes = Arrays::flattenValues( $classes );
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
	 * @throws CommonException
	 */
	public function withStyle( ...$styles ) {

		$styles = Arrays::flattenValues( $styles );

		foreach ( $styles as $style ) {
			$arrayProps = HtmlHelper::parseInLineStyle( $style );
			$this->withCssProperties( $arrayProps );
		}

		return $this;
	}

	/**
	 * CSS properties array Ex: ['display' => 'block', 'property name' => 'property value' ...]
	 *
	 * @param array $propertiesArray
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function withCssProperties( array $propertiesArray ) {
		foreach ( $propertiesArray as $propertyName => $propertyValue ) {
			$this->withCssProperty( $propertyName, $propertyValue );
		}

		return $this;
	}

	/**
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function withCssProperty( $propertyName, $propertyValue ) {
		HtmlHelper::validateNameOfAttribute( $propertyName );
		$propertyValue = Strings::toString( $propertyValue );
		$this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $propertyName ] = $propertyValue;

		return $this;
	}

	/**
	 * @param string ...$propertyName
	 * @return $this
	 */
	public function withOutCssProperty( ...$propertyName ) {

		$propertyNames = Arrays::flattenValues( $propertyName );
		foreach ( $propertyNames as $property ) {
			if ( isset( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $property ] ) ) {
				unset( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ][ $property ] );
			}
		}

		return $this;
	}

	/**
	 * @param string|array ...$attributeName
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withOutAttribute( ...$attributeName ) {

		$attributeNames = Arrays::flattenValues( $attributeName );
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

		$classes = Arrays::flattenValues( $classes );
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
	 * Prepare element clone
	 */
	public function __clone() {
		foreach ( $this->htmlElements as $index => $htmlElement ) {
			$this->htmlElements[ $index ] = clone $htmlElement;
		}
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function __toString() {
		return $this->getMarkup();
	}

	/**
	 * @return $this
	 */
	public function getClone() {
		return clone $this;
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	protected function getComputedAttributes() {
		$attributes = [];
		foreach ( $this->getCleanAttributes() as $key => $value ) {
			switch ( $key ) {
				case ConstHtml::ATTRIBUTE_CLASS:
					$value = $this->getComputedClass();
					break;
				case ConstHtml::ATTRIBUTE_STYLE:
					$value = $this->getComputedStyle();
					break;
			}
			$value = trim( $value );
			$computed = $key;
			if ( !Strings::isEmpty( $value ) ) {
				$computed .= ' = ' . HtmlHelper::getSafeHtmlString( $value );
			}
			$attributes[] = $computed;
		}

		return implode( ' ', $attributes );
	}

	/**
	 * @return string
	 */
	protected function getComputedClass() {
		return implode( ' ', Arrays::flattenValues( $this->attributes[ ConstHtml::ATTRIBUTE_CLASS ], true ) );
	}

	/**
	 * @return string
	 */
	protected function getComputedStyle() {
		$result = [];
		foreach ( $this->attributes[ ConstHtml::ATTRIBUTE_STYLE ] as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}

}
