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

	const ATTRIBUTE_ID = 'id';
	const ATTRIBUTE_NAME = 'name';
	const ATTRIBUTE_CLASS = 'class';
	const ATTRIBUTE_STYLE = 'style';

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var array
	 */
	protected $classes = [];

	/**
	 * @var array
	 */
	protected $styles = [];

	/**
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * @var HtmlElementInterface[]|string[]
	 */
	protected $htmlElements = [];

	/**
	 * @var string
	 */
	protected $endLine = '';

	/**
	 * @var string
	 */
	protected $indentLine = '\t';

	/**
	 * @var array
	 */
	protected $specialAttributes = [
		self::ATTRIBUTE_ID,
		self::ATTRIBUTE_NAME,
		self::ATTRIBUTE_CLASS,
		self::ATTRIBUTE_STYLE
	];

	/**
	 * @return string||null
	 */
	abstract protected function getHtmlTag();

	/**
	 * @return bool
	 */
	abstract protected function isContainer();

	/**
	 * @param $id string
	 * @return $this
	 */
	public function withId( $id )
	{
		$this->id = $id;

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
				$this->classes[] = $item;
			}
			$this->classes = array_values( array_unique( $this->classes ) );
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

		$this->styles[ $styleName ] = $styleValue;

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
	 * @param string $attrName
	 * @param string|null $attrValue
	 * @throws HtmlBuilderException
	 */
	protected function _createAttribute( $attrName, $attrValue = null )
	{
		if ( !is_string( $attrName ) || empty( $attrName ) ) {
			throw new HtmlBuilderException( 'Invalid attribute name.' );
		}

	}

	/**
	 * @return string
	 */
	protected function getComputedCSSStyle()
	{
		$result = [];
		foreach ( $this->styles as $styleName => $styleValue ) {
			if ( $styleValue !== '' ) {
				$result[] = $styleName . ':' . $styleValue;
			}
		}

		return implode( '; ', $result );
	}

	/**
	 * @return $this
	 */
	public static function create()
	{
		return new static();
	}

}

