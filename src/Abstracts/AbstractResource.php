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
	 * @var string|null
	 */
	protected $resourceUrl;

	/**
	 * @var string|null
	 */
	protected $version;



	public function __construct( $resourceUrl = null ) {
		parent::__construct();
		$this->resourceUrl = $resourceUrl;
	}

	/**
	 * @param null|string $version
	 * @return $this
	 */
	public function setVersion( $version = null ) {
		$this->version = $version;

		return $this;
	}

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