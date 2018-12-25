<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/23/2018
 * Time: 9:51 AM
 */

namespace Qpdb\HtmlBuilder\Elements;

use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Interfaces\TagAttributesInterface;
use Qpdb\HtmlBuilder\Traits\Attributes\AttributesBuilder;
use Qpdb\HtmlBuilder\Traits\Attributes\AttributesHelper;

class TagAttributes implements TagAttributesInterface
{

	use AttributesHelper, AttributesBuilder;

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
	 * @return void
	 * @throws HtmlBuilderException
	 */
	public function withAttribute( $attributeName, $attributeValue ) {
		$this->validateNameOfAttribute( $attributeName );
		switch ( $attributeName ) {
			case ConstHtml::ATTRIBUTE_CLASS:
				$this->addClass( $attributeValue );
				break;
			case ConstHtml::ATTRIBUTE_STYLE:
				$this->addStyle( $attributeValue );
				break;
			default:
				$this->validateValueOfAttribute( $attributeValue );
				$this->attributes[ $attributeName ] = $attributeValue;
		}
	}


	/**
	 * @param string $attributeName
	 * @return void
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function deleteAttribute( $attributeName ) {
		$this->validateNameOfAttribute( $attributeName );
		switch ( $attributeName ) {
			case ConstHtml::ATTRIBUTE_CLASS:
			case ConstHtml::ATTRIBUTE_STYLE:
				$this->attributes[ $attributeName ] = [];
				break;
			default:
				if ( array_key_exists( $attributeName, $this->attributes ) ) {
					$this->attributes[ $attributeName ] = null;
				}
		}
	}

	/**
	 * @return string
	 */
	public function getComputedAttributes() {
		$attributes = [];
		foreach ( $this->toArray() as $key => $value ) {
			$value = trim( $value );
			$computed = $key;
			if ( !empty( $value ) ) {
				$computed .= ' = ' . $this->getSafeHtmlString( $value );
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
					$preparedArray[ $key ] = implode( ' ', array_unique( $value ) );
					break;
				case ConstHtml::ATTRIBUTE_STYLE:
					$preparedArray[ $key ] = $this->getComputedCSSStyle( $value );
					break;
				default:
					$preparedArray[ $key ] = $value;
			}
		}

		return $preparedArray;
	}

}