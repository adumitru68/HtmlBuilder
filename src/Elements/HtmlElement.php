<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/26/2019
 * Time: 12:19 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Elements\Parts\CustomElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class HtmlElement
{

	/**
	 * @param $tag
	 * @return CustomElement
	 * @throws HtmlBuilderException
	 */
	public static function create($tag) {
		return new CustomElement($tag);
	}

}