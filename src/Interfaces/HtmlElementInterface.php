<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 1:35 AM
 */

namespace Qpdb\HtmlBuilder\Interfaces;

/**
 * Interface HtmlElementInterface
 * @package Qpdb\HtmlBuilder\Interfaces
 */
interface HtmlElementInterface
{
	const ATTRIBUTE_ID = 'id';
	const ATTRIBUTE_NAME = 'name';
	const ATTRIBUTE_VALUE = 'value';
	const ATTRIBUTE_CLASS = 'class';
	const ATTRIBUTE_STYLE = 'style';
	const ATTRIBUTE_DATA = 'data';
	const ATTRIBUTE_PLACEHOLDER = 'placeholder';

	/**
	 * @return string
	 */
	public function getHTMLMarkup();

	/**
	 * @return void
	 */
	public function render();


}