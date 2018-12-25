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
	 * @return mixed
	 */
	public function withAttribute( $attributeName, $attributeValue );

	/**
	 * @param string $attributeName
	 * @return mixed
	 */
	public function deleteAttribute( $attributeName );

	/**
	 * @return string
	 */
	public function getComputedAttributes();

	/**
	 * @return array
	 */
	public function toArray();


}