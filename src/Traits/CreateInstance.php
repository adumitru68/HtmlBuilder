<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/28/2018
 * Time: 10:32 PM
 */

namespace Qpdb\HtmlBuilder\Traits;


trait CreateInstance
{

	/**
	 * @return $this
	 */
	public static function create()
	{
		return new static();
	}

}