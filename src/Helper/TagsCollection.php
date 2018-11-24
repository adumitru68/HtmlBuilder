<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/11/2018
 * Time: 6:05 AM
 */

namespace Qpdb\HtmlBuilder\Helper;


use Qpdb\Prototype\Traits\AsSingletonPrototype;

class TagsCollection
{

	use AsSingletonPrototype;


	/**
	 * @var array
	 */
	private $newTags = [];

	/**
	 * @var array
	 */
	private $newClosedTags = [];

	/**
	 * @var array
	 */
	private $newInlineTags = [];

	/**
	 * @var array
	 */
	private $htmlTags = [];

	/**
	 * @var array
	 */
	private $htmlClosedTags = [];


	/**
	 * TagsCollection constructor.
	 */
	public function __construct()
	{
		$this->htmlTags = require __DIR__ . '/../../resources/tags_html5.php';
		$this->htmlClosedTags = require __DIR__ . '/../../resources/tags_html5_self_clossing.php';
	}

	/**
	 * @param string $tag
	 * @return $this
	 */
	public function addNewTag( $tag )
	{
		if ( !empty( $tag ) ) {
			$this->newTags[] = $tag;
		}

		return $this;
	}

	/**
	 * @param $tag
	 * @return $this
	 */
	public function addNewClosedTags( $tag )
	{
		if ( !empty( $tag ) ) {
			$this->newClosedTags[] = $tag;
		}

		return $this;
	}

	/**
	 * @param $tag
	 * @return $this
	 */
	public function addNewInlineTag( $tag )
	{
		if ( !empty( $tag ) ) {
			$this->newInlineTags[] = $tag;
		}

		return $this;
	}

	/**
	 * @param bool $asString
	 * @return array|string
	 */
	public function getNewTags( $asString = false )
	{
		if ( $asString ) {
			return implode( ',', $this->newTags );
		}

		return $this->newTags;
	}


	/**
	 * @param bool $asString
	 * @return array|string
	 */
	public function getNewClosedTags( $asString = false )
	{
		if ( $asString ) {
			return implode( ',', $this->newClosedTags );
		}

		return $this->newClosedTags;
	}

	/**
	 * @param bool $asString
	 * @return array|string
	 */
	public function getNewInlineTags( $asString = false )
	{
		if ( $asString ) {
			return implode( ',', $this->newInlineTags );
		}

		return $this->newInlineTags;
	}


}