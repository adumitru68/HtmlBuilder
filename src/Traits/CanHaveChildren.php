<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 9/30/2018
 * Time: 2:10 AM
 */

namespace Qpdb\HtmlBuilder\Traits;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
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
	 * @var HtmlElementInterface[]|string[]
	 */
	protected $htmlElements = [];

	/**
	 * @return bool
	 */
	protected function isSelfClosed()
	{
		return false;
	}

	/**
	 * @param HtmlElementInterface $html
	 * @return $this
	 */
	public function withHtmlElement( HtmlElementInterface $html )
	{
		$this->htmlElements[] = $html;

		return $this;
	}

	/**
	 * @param string $content
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function withCustomContent( $content = '' )
	{
		if ( !is_string( $content ) ) {
			throw new HtmlBuilderException( 'Invalid content type' );
		}
		$this->htmlElements[] = $content;

		return $this;
	}


}