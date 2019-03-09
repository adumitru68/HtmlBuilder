<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 3/8/2019
 * Time: 2:05 AM
 */

namespace Qpdb\HtmlBuilder\Abstracts;


abstract class AbstractResource extends AbstractHtmlElement
{

	/**
	 * @var mixed
	 */
	protected $location;

	/**
	 * @param mixed $location
	 * @return $this
	 */
	public function setLocation( $location ) {
		$this->location = $location;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocation() {
		return $this->location;
	}

}