<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:07 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlLegend extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @param string ...$label
	 * @return $this
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function label( ...$label ) {
		$this->withPlainText( $label );
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'legend';
	}
}