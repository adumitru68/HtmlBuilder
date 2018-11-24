<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:51 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;

use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

abstract class AbstractHtmlElement
{

	/**
	 * @var array
	 */
	protected $attributes = [
		HtmlElementInterface::ATTRIBUTE_ID => null,
		HtmlElementInterface::ATTRIBUTE_CLASS => [],
		HtmlElementInterface::ATTRIBUTE_STYLE => []
	];

	/**
	 * @var HtmlElementInterface[]|string[]
	 */
	protected $htmlElements = [];

	/**
	 * @return string||null
	 */
	abstract protected function getHtmlTag();

	/**
	 * @return bool
	 */
	protected function isContainer()
	{
		return false;
	}

	/**
	 * @param $id string
	 * @return $this
	 */
	public function withId( $id )
	{
		$this->attributes[ HtmlElementInterface::ATTRIBUTE_ID ] = $id;

		return $this;
	}

	/**
	 * @param string[] ...$classes
	 * @return $this
	 */
	public function withClass( ...$classes )
	{
		foreach ( $classes as $class ) {
			$class = Strings::removeMultipleSpace( (string)$class );
			$class = str_replace( ' ', ',', $class );
			foreach ( explode( ',', $class ) as $item ) {
				$item = Strings::removeMultipleSpace( (string)$item );
				if ( empty( $item ) ) {
					continue;
				}
				$this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ][] = $item;
			}
			$this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ] = array_values( array_unique( $this->attributes[ HtmlElementInterface::ATTRIBUTE_CLASS ] ) );
		}

		return $this;
	}

	/**
	 * @param string $styleName
	 * @param string $styleValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withStyle( $styleName, $styleValue )
	{
		$styleName = trim( (string)$styleName );
		$styleValue = trim( (string)$styleValue );

		if ( empty( $styleName ) ) {
			throw new HtmlBuilderException( 'Invalid style property name' );
		}

		if ( empty( $styleValue ) ) {
			throw new HtmlBuilderException( 'Invalid style property value' );
		}

		$this->attributes[ HtmlElementInterface::ATTRIBUTE_STYLE ][ $styleName ] = $styleValue;

		return $this;
	}

	/**
	 * @param string $attributeName
	 * @param string $attributeValue
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withAttribute( $attributeName, $attributeValue = null )
	{
		$attributeName = trim( (string)$attributeName );

		if ( empty( $attributeName ) ) {
			throw  new HtmlBuilderException( 'Attribute name is empty' );
		}

		$this->attributes[ $attributeName ] = is_null( $attributeValue ) ? null : trim( (string)$attributeValue );

		return $this;
	}


	/**
	 * @return $this
	 */
	public static function create()
	{
		return new static();
	}

}

