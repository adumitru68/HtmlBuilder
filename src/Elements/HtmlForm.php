<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/16/2018
 * Time: 1:30 AM
 */

namespace Qpdb\HtmlBuilder\Elements;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;
use Qpdb\HtmlBuilder\Traits\CanHaveChildren;
use Qpdb\HtmlBuilder\Traits\MarkupGenerator;

class HtmlForm extends AbstractHtmlElement implements HtmlElementInterface
{

	use MarkupGenerator, CanHaveChildren;

	const ENCTYPE_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';
	const ENCTYPE_MULTIPART_FORM_DATA = 'multipart/form-data';
	const ENCTYPE_TEXT_PLAIN = 'text/plain';
	const METHOD_POST = 'post';
	const METHOD_GET = 'get';

	/**
	 * @var array
	 */
	protected $acceptedEncType = [
		self::ENCTYPE_WWW_FORM_URLENCODED,
		self::ENCTYPE_MULTIPART_FORM_DATA,
		self::ENCTYPE_TEXT_PLAIN
	];

	/**
	 * @var array
	 */
	protected $acceptedMethod = [
		self::METHOD_GET,
		self::METHOD_POST
	];

	/**
	 * @return string||null
	 */
	protected function getHtmlTag()
	{
		return 'form';
	}


	/**
	 * @param string $method
	 * @return HtmlForm
	 * @throws HtmlBuilderException
	 */
	public function withMethod( $method )
	{
		if ( !in_array( $method, $this->acceptedMethod ) ) {
			throw new HtmlBuilderException( 'Invalid form method' );
		}

		return $this->withAttribute( 'method', $method );
	}

	/**
	 * @param string $encType
	 * @return HtmlForm
	 * @throws HtmlBuilderException
	 */
	public function withEncType( $encType )
	{
		if ( !in_array( $encType, $this->acceptedEncType ) ) {
			throw new HtmlBuilderException( 'Invalid enctype value' );
		}

		return $this->withAttribute( 'enctype', $encType );
	}

	/**
	 * @param string $action
	 * @return HtmlForm
	 * @throws HtmlBuilderException
	 */
	public function withAction( $action )
	{
		if ( empty( trim( $action ) ) ) {
			throw new HtmlBuilderException( 'Invalid form action url' );
		}

		return $this->withAttribute( 'action', $action );
	}

}