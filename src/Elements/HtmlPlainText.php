<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/26/2019
 * Time: 8:47 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class HtmlPlainText extends AbstractHtmlElement
{

	/**
	 * @var array
	 */
	protected $plainTexts = [];

	/**
	 * @var string
	 */
	protected $separator = '';

	/**
	 * @return string
	 */
	public function getTag() {
		return '';
	}


	/**
	 * @param string|array ...$texts
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withPlainText( ...$texts ) {
		$texts = Arrays::flattenValues( $texts );
		foreach ( $texts as $text ) {
			try {
				$this->plainTexts[] = Strings::toString( $text );
			} catch ( CommonException $e ) {
				throw new HtmlBuilderException( 'Invalid plain text or html' );
			}
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMarkup() {
		return implode( $this->separator, $this->plainTexts );
	}

}