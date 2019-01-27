<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/8/2018
 * Time: 4:09 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Elements\HtmlDiv;
use Qpdb\HtmlBuilder\Elements\Parts\CustomElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class Html
{

	/**
	 * @param string $tag
	 * @return CustomElement
	 * @throws HtmlBuilderException
	 */
	public static function create( $tag ) {
		return new CustomElement( $tag );
	}

	/**
	 * @return CustomElement
	 * @throws HtmlBuilderException
	 */
	public function elementCollection() {
		return new CustomElement('');
	}

	/**
	 * @return HtmlDiv
	 * @throws HtmlBuilderException
	 */
	public static function div() {
		return new HtmlDiv();
	}


}