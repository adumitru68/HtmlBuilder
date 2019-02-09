<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:05 PM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Elements\HtmlLegend;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlFieldset extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @param $legendCaption
	 * @return $this
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function legend( $legendCaption ) {
		$this->withHtmlElement(
			( new HtmlLegend() )->withPlainText( $legendCaption )
		);

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'fieldset';
	}
}