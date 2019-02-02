<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 2:10 AM
 */

namespace Qpdb\HtmlBuilder\Traits;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Helpers\Strings;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Elements\HtmlPlainText;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

/**
 * Trait CanHaveChildren
 * @package Qpdb\HtmlBuilder\Traits
 * @var AbstractHtmlElement $this
 */
trait CanHaveChildren
{

	/**
	 * @param HtmlElementInterface[] ...$htmlElement
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withHtmlElement( ...$htmlElement ) {
		$htmlElement = Arrays::flatValues( $htmlElement );
		foreach ( $htmlElement as $element ) {
			if ( !$element instanceof HtmlElementInterface ) {
				throw new HtmlBuilderException( 'The element needs to be implemented HtmlElementInterface' );
			}
			$this->htmlElements[] = $element;
		}

		return $this;
	}

	/**
	 * @param array|string ...$textContents
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withPlainText( ...$textContents ) {
		try {
			$this->withHtmlElement(
				( new HtmlPlainText() )->withPlainText( $textContents ) );
		} catch ( CommonException $e ) {
			throw new HtmlBuilderException( 'Invalid plain text or html. Trait CanHaveChildren' );
		}

		return $this;
	}


}