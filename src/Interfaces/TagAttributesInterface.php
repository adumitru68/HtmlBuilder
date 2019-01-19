<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/23/2018
 * Time: 9:21 AM
 */

namespace Qpdb\HtmlBuilder\Interfaces;


interface TagAttributesInterface
{

	/**
	 * @param string       $attributeName
	 * @param string|array $attributeValue
	 * @return $this
	 */
	public function withAttribute( $attributeName, $attributeValue );

	/**
	 * @param string|array ...$attributeName
	 * @return $this
	 */
	public function withOutAttribute( ...$attributeName );

	/**
	 * @param string|array ...$classes
	 * @return $this
	 */
	public function withClass( ...$classes );

	/**
	 * @param string|array ...$classes
	 * @return $this
	 */
	public function withOutClass( ...$classes );

	/**
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @return $this
	 */
	public function withStyleProperty( $propertyName, $propertyValue );

	/**
	 * CSS properties array Ex: ['display' => 'block', 'property name' => 'property value' ...]
	 *
	 * @param array $propertiesArray
	 * @return $this
	 */
	public function withStyleProperties( array $propertiesArray );

	/**
	 * @param mixed ...$styles
	 * @return $this
	 */
	public function withInLineStyle( ...$styles );

	/**
	 * @param string ...$propertyName
	 * @return $this
	 */
	public function withOutStyleProperty( ...$propertyName );

	/**
	 * @return string
	 */
	public function getComputedClass();

	/**
	 * @return string
	 */
	public function getComputedStyle();

	/**
	 * @return string
	 */
	public function getComputedAttributes();

	/**
	 * @return array
	 */
	public function toArray();

	/**
	 * @return $this
	 */
	public function getClone();


}