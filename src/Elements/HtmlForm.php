<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 2/3/2019
 * Time: 3:46 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Helper\ConstHtml;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;

class HtmlForm extends AbstractHtmlElement
{
	use CanHaveChildren;

	/**
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function methodGet() {
		return $this->withAttribute(
			ConstHtml::FORM_METHOD,
			ConstHtml::FORM_METHOD_GET
		);
	}

	/**
	 * @return $this
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public function methodPost() {
		return $this->withAttribute(
			ConstHtml::FORM_METHOD,
			ConstHtml::FORM_METHOD_POST
		);
	}

	/**
	 * @param $method
	 * @return $this
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function withMethod( $method ) {
		return $this->withAttribute(
			ConstHtml::FORM_METHOD,
			$method
		);
	}

	/**
	 * @return HtmlForm
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function encTypeUrlEncoded() {
		return $this->withAttribute(
			ConstHtml::FORM_ENCTYPE,
			ConstHtml::FORM_ENCTYPE_WWW_FORM_URLENCODED
		);
	}

	/**
	 * @return HtmlForm
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function encTypePlainText() {
		return $this->withAttribute(
			ConstHtml::FORM_ENCTYPE,
			ConstHtml::FORM_ENCTYPE_TEXT_PLAIN
		);
	}

	/**
	 * @return HtmlForm
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function encTypeMultipart() {
		return $this->withAttribute(
			ConstHtml::FORM_ENCTYPE,
			ConstHtml::FORM_ENCTYPE_MULTIPART_FORM_DATA
		);
	}

	/**
	 * @param $encType
	 * @return HtmlForm
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function withEncType( $encType ) {
		return $this->withAttribute(
			ConstHtml::FORM_ENCTYPE,
			$encType
		);
	}

	/**
	 * @param $url
	 * @return HtmlForm
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public function withAction( $url ) {
		return $this->withAttribute(
			ConstHtml::FORM_ACTION,
			$url
		);
	}

	/**
	 * @return string
	 */
	public function getTag() {
		return 'form';
	}
}