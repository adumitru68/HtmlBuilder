<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/20/2019
 * Time: 12:43 AM
 */

namespace Qpdb\HtmlBuilder\Interfaces;


interface HtmlViewInterface extends HtmlElementInterface
{

	/**
	 * @param string $name
	 * @param mixed  $value
	 * @return $this
	 */
	public function set( $name, $value );

	/**
	 * @param string $variableName
	 * @return mixed
	 */
	public function get( $variableName );

	/**
	 * @return array
	 */
	public function getStoredData();

	/**
	 * @param array $data
	 * @return $this
	 */
	public function withStoredData( array $data );

	/**
	 * @return mixed
	 */
	public function getTemplatePath();

	/**
	 * @param string $templatePath
	 * @return $this
	 */
	public function setTemplatePath( $templatePath );

	/**
	 * @param string|null $basePath
	 * @return $this
	 */
	public function setBasePath( $basePath );

	/**
	 * @return string|null
	 */
	public function getBasePath();

	/**
	 * @param string $templatePath
	 * @param array  $params
	 * @return $this
	 */
	public function render( $templatePath, array $params = [] );


}