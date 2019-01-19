<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/12/2019
 * Time: 3:49 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlElementInterface;

abstract class AbstractView implements HtmlElementInterface
{

	/**
	 * @var string
	 */
	protected $basePath;

	/**
	 * @var
	 */
	protected $templatePath;

	/**
	 * @var array
	 */
	protected $vars = [];

	/**
	 * @param $varName
	 * @param $value
	 * @return $this
	 * @throws HtmlBuilderException
	 */
	public function set( $varName, $value ) {
		$this->validateVarName( $varName );
		$this->vars[ $varName ] = $value;

		return $this;
	}

	/**
	 * @param null $varName
	 * @param bool $throwExceptionIfNotDefine
	 * @return array|mixed|null
	 * @throws HtmlBuilderException
	 */
	public function get( $varName = null, $throwExceptionIfNotDefine = false ) {
		if(null === $varName) {
			return $this->vars;
		}
		$this->validateVarName($varName);
		if(!isset($this->vars[$varName]) && $throwExceptionIfNotDefine) {
			throw new HtmlBuilderException('Variable view '. $varName . ' is not define');
		}

		return isset($this->vars[$varName]) ? $this->vars[$varName] : null;
	}

	/**
	 * @return string
	 */
	public function getMarkup() {
		// TODO: Implement getHTMLMarkup() method.
	}

	/**
	 * @return void
	 */
	public function render() {
		// TODO: Implement render() method.
	}

	/**
	 * @param string $varName
	 * @throws HtmlBuilderException
	 */
	protected function validateVarName( $varName ) {
		throw new HtmlBuilderException( 'Variable name must be string' );
	}

}