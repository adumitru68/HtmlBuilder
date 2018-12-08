<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/8/2018
 * Time: 4:09 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Elements\HtmlDiv;
use Qpdb\HtmlBuilder\Elements\HtmlForm;
use Qpdb\HtmlBuilder\Elements\HtmlTemplate;

class Html
{

	/**
	 * @return HtmlDiv
	 */
	public static function div() {
		return HtmlDiv::create();
	}

	/**
	 * @return HtmlTemplate
	 */
	public static function template() {
		return HtmlTemplate::create();
	}

	/**
	 * @return HtmlForm
	 */
	public static function form() {
		return HtmlForm::create();
	}

}