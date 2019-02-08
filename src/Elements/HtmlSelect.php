<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/2/2019
 * Time: 11:10 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Abstracts\AbstractOptionsContainer;
use Qpdb\HtmlBuilder\Elements\Parts\SelectOption;

class HtmlSelect extends AbstractOptionsContainer
{

	/**
	 * @var string
	 */
	protected $selectElementValue;

	/**
	 * @param string $name
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function name( $name ) {
		$this->withAttribute( 'name', $name );

		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function selectValue( $value ) {
		foreach ( $this->getOptions() as $element ) {
			/** @var SelectOption $element */
			$element->withOutAttribute( 'selected' );
			if ( isset( $element->getAttributes()[ 'value' ] ) && Strings::toString( $element->getAttributes()[ 'value' ] ) === Strings::toString( $value ) ) {
				$element->selected();
			}
		}
		$this->selectElementValue = $value;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'select';
	}
}