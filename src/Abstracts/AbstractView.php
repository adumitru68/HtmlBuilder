<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/12/2019
 * Time: 3:49 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\Common\Helpers\Arrays;
use Qpdb\Common\Prototypes\Traits\AsStoredSettings;
use Qpdb\HtmlBuilder\Elements\HtmlLink;
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
	public function loadTemplate( $templatePath ) {
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
		include $this->templatePath;

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
	 */
	public function getClone() {
		return clone $this;
	}
}