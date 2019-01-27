<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/12/2019
 * Time: 3:49 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\PrototypeException;
use Qpdb\Common\Prototypes\Traits\AsStoredSettings;
use Qpdb\HtmlBuilder\Interfaces\HtmlViewInterface;

abstract class AbstractView implements HtmlViewInterface
{

	use AsStoredSettings;

	/**
	 * @var string
	 */
	protected $templatePath;


	/**
	 * @param string $templatePath
	 * @return $this
	 */
	public function withTemplate( $templatePath ) {
		$this->templatePath = $templatePath;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMarkup() {

		foreach ( $this->__prototype_stored_settings_vars as $name => $value ) {
			$$name = $value;
		}

		ob_start();

		/** @noinspection PhpIncludeInspection */
		include $this->getRealTemplatePath();

		return ob_get_clean();
	}

	/**
	 * @return void
	 */
	public function render() {
		echo $this->getMarkup();
	}

	/**
	 * @return $this
	 * @throws PrototypeException
	 */
	public static function create() {
		return new static();
	}

	/**
	 * @return string
	 */
	protected function getRealTemplatePath() {
		$templatePath = '';

		if ( empty( $templatePath ) ) {
			$templatePath = __DIR__ . '/../../resources/views/view_not_found.phtml';
		}

		return $templatePath;
	}

}