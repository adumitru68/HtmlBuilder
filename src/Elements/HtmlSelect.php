<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/2/2019
 * Time: 11:10 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Helpers\Arrays;
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
	 * @param bool $multiple
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function multiple( $multiple = true ) {
		if ( $multiple ) {
			$this->withAttribute( 'multiple' );
		} else {
			$this->withOutAttribute( 'multiple' );
		}

		return $this;
	}

	/**
	 * @param mixed ...$values
	 * @return $this
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 * @throws \Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException
	 */
	public function selectValue( ...$values ) {
		$values = Arrays::flattenValues( $values );
		foreach ( $this->getOptions() as $element ) {
			/** @var SelectOption $element */
			$element->withOutAttribute( 'selected' );
			if ( isset( $element->getAttributes()[ 'value' ] ) && in_array( $element->getAttributes()[ 'value' ], $values ) ) {
				$element->selected();
			}
		}
		$this->selectElementValue = $values;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'select';
	}
}