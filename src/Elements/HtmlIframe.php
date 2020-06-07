<?php


namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;

class HtmlIframe extends AbstractHtmlElement
{

	/**
	 * @inheritDoc
	 */
	public function getTag() {
		return 'iframe';
	}

	/**
	 * @param $src
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function src( $src ) {
		$this->withAttribute( ConstHtml::ATTRIBUTE_SRC, $src );

		return $this;
	}

	/**
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function lazyLoading() {
		$this->withAttribute('loading', 'lazy');

		return $this;
	}

}