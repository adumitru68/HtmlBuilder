<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/12/2019
 * Time: 3:49 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Prototypes\Traits\AsStoredSettings;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Interfaces\HtmlViewInterface;

abstract class AbstractView implements HtmlViewInterface
{

	use AsStoredSettings;

	/**
	 * @var string|null
	 */
	protected $basePath;

	/**
	 * @var string|null
	 */
	protected $templatePath;


	/**
	 * AbstractView constructor.
	 * @param string|null $basePath
	 * @param string|null $templatePath
	 * @param array       $params
	 */
	public function __construct( $basePath = null, $templatePath = null, array $params = [] ) {
		$this->basePath = $basePath;
		$this->templatePath = $templatePath;
		$this->withStoredData( $params );
	}


	/**
	 * @param null|string $templatePath
	 * @return $this
	 */
	public function setTemplatePath( $templatePath ) {
		$this->templatePath = (string)$templatePath;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTemplatePath() {
		return $this->templatePath;
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function getMarkup() {

		if ( empty( $this->getFullPath() ) ) {
			throw new HtmlBuilderException( 'Empty template file path' );
		}

		if ( !file_exists( $this->getFullPath() ) ) {
			throw new HtmlBuilderException( 'Invalid template file path' );
		}

		foreach ( $this->__prototype_stored_settings_vars as $name => $value ) {
			$$name = $value;
		}

		ob_start();

		/** @noinspection PhpIncludeInspection */
		include $this->getFullPath();

		return ob_get_clean();
	}

	/**
	 * @param string $templatePath
	 * @param array  $params
	 * @return $this
	 */
	public function render( $templatePath, array $params = [] ) {
		$renderView = $this->getClone();
		$renderView->setTemplatePath( $templatePath );
		$renderView->withStoredData( $params );

		return $renderView;
	}

	/**
	 * @return void
	 * @throws HtmlBuilderException
	 */
	public function output() {
		echo $this->getMarkup();
	}

	/**
	 * @return string
	 * @throws HtmlBuilderException
	 */
	public function __toString() {
		return $this->getMarkup();
	}

	/**
	 * @return $this
	 */
	public function getClone() {
		return clone $this;
	}

	/**
	 * @return string|null
	 */
	public function getBasePath() {
		return $this->basePath;
	}

	/**
	 * @param string|null $basePath
	 */
	public function setBasePath( $basePath ) {
		$this->basePath = (string)$basePath;
	}

	public function getFullPath() {
		$fullPath = [];
		$fullPath[] = trim( (string)$this->getBasePath() );
		$fullPath[] = trim( (string)$this->getTemplatePath() );
		$fullPath = implode( '/', $fullPath );
		$fullPath = preg_replace( '#/+#', '/', $fullPath );

		return trim( $fullPath, '/' );
	}

}