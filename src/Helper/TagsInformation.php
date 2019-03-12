<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/24/2018
 * Time: 6:02 PM
 */

namespace Qpdb\HtmlBuilder\Helper;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class TagsInformation
{

	use AsSingletonPrototype;

	/**
	 * @var array
	 */
	private $htmlTags;

	/**
	 * @var array
	 */
	private $htmlTagsSelfClosed;

	/**
	 * @var array
	 */
	private $htmlInlineTags;

	/**
	 * @var array
	 */
	private $htmlNewLineTags;


	/**
	 * TagsInformation constructor.
	 */
	public function __construct() {
		$this->htmlTags = require __DIR__ . '/../../resources/tags_html5.php';
		$this->htmlTagsSelfClosed = require __DIR__ . '/../../resources/tags_html5_self_clossing.php';
		$this->htmlInlineTags = require __DIR__ . '/../../resources/tags_html5_inline.php';
		$this->htmlNewLineTags = require __DIR__ . '/../../resources/tags_html5_new_line.php';
	}

	/**
	 * @param string $tag
	 * @return bool
	 */
	public function isTag( $tag ) {
		return in_array( trim( $tag ), $this->htmlTags );
	}

	/**
	 * @param string $tag
	 * @return bool
	 */
	public function isSelfClosedTag( $tag ) {
		return in_array( trim( $tag ), $this->htmlTagsSelfClosed );
	}

	/**
	 * @param string $tag
	 * @return bool
	 */
	public function isInlineTag( $tag ) {
		return in_array( trim( $tag ), $this->htmlInlineTags );
	}

	/**
	 * @param string $tag
	 * @return bool
	 */
	public function isNewLineTag( $tag ) {
		return in_array( trim( $tag ), $this->htmlNewLineTags );
	}

}