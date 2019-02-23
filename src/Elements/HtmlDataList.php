<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/9/2019
 * Time: 11:58 PM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Elements\Parts\DatalistOption;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlDataList extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @param mixed ...$options
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException]
	 */
	public function options( ...$options ) {
		$options = Arrays::flattenValues( $options );
		foreach ( $options as $index => $option ) {
			if ( $option instanceof DatalistOption ) {
				$this->withHtmlElement( $option );
			} else {
				$this->withHtmlElement( new DatalistOption( Strings::toString( $option ) ) );
			}
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'datalist';
	}
}