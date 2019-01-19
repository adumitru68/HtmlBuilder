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
	/**
	 * @return string
	 */
	public function getMarkup();

	/**
	 * @return void
	 */
	public function render();

	/**
	 * @return $this
	 */
	public static function create();

}