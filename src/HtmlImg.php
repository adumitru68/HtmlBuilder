<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/10/2018
 * Time: 3:37 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlImg extends AbstractHtmlElement implements HtmlElementInterface
{
	use MarkupGenerator;

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'img';
	}

	/**
	 * @param string $src
	 * @return $this
	 * @throws Exceptions\HtmlBuilderException
	 */
	public function src( $src )
	{
		return $this->withAttribute( 'src', $src );
	}

	/**
	 * @param string $alt
	 * @return $this
	 * @throws Exceptions\HtmlBuilderException
	 */
	public function alt( $alt )
	{
		return $this->withAttribute( 'alt', $alt );
	}
}