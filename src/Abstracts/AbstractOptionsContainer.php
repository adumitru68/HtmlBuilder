<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/2/2019
 * Time: 3:27 PM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Helpers\Arrays;
use Qpdb\HtmlBuilder\Elements\Parts\SelectOptgroup;
use Qpdb\HtmlBuilder\Elements\Parts\SelectOption;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

abstract class AbstractOptionsContainer extends AbstractHtmlElement
{
	/**
	 * @var SelectOption[]
	 */
	protected $options = [];

	/**
	 * @param mixed ...$options
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withOptions( ...$options ) {
		$options = Arrays::flatValues( $options );
		foreach ( $options as $option ) {
			switch (true) {
				case $option instanceof SelectOption:
				case $option instanceof SelectOptgroup:
					$this->htmlElements[] = $option;
					break;
				default:
					throw new HtmlBuilderException('Option must SelectOption or SelectOptgroup instance');
					break;
			}
		}

		return $this;
	}

	/**
	 * @param array $assocArray
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function withOptionsByAssoc($assocArray = []) {
		foreach ($assocArray as $value => $label) {
			$this->htmlElements[] = (new SelectOption())
				->withLabel($label)
				->withValue($value);
		}

		return $this;
	}


	public function getOptions() {
		$options = [];
		foreach ($this->htmlElements as $element) {
			if($element instanceof SelectOptgroup) {
				$options[] = $element->getOptions();
			} else {
				$options [] = $element;
			}
		}

		return Arrays::flatValues($options);
	}

}