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
	protected $templatePath;


	/**
	 * AbstractView constructor.
	 * @param string|null $templatePath
	 * @param array       $params
	 */
	public function __construct( $templatePath = null, array $params = [] ) {
		$this->templatePath = $templatePath;
		$this->withStoredData( $params );
	}


	/**
	 * @param string $templatePath
	 * @return $this
	 */
	public function setTemplatePath( $templatePath ) {
		$this->templatePath = $templatePath;

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

		if ( empty( $this->getTemplatePath() ) ) {
			throw new HtmlBuilderException( 'Empty template file path' );
		}

		if ( !file_exists( $this->getTemplatePath() ) ) {
			throw new HtmlBuilderException( 'Invalid template file path' );
		}

		foreach ( $this->__prototype_stored_settings_vars as $name => $value ) {
			$$name = $value;
		}

		ob_start();

		/** @noinspection PhpIncludeInspection */
		include $this->getTemplatePath();

		return ob_get_clean();
	}

	/**
	 * @return void
	 * @throws HtmlBuilderException
	 */
	public function render() {
		echo $this->getMarkup();
	}

	/**
	 * @return $this
	 */
	public function getClone() {
		return clone $this;
	}
}