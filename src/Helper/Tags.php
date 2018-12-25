<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/24/2018
 * Time: 6:02 PM
 */

namespace Qpdb\HtmlBuilder\Helper;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class Tags
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
	 * Tags constructor.
	 */
	public function __construct() {
		$this->htmlTags = require __DIR__ . '/../../resources/tags_html5.php';
		$this->htmlTagsSelfClosed = __DIR__ . '/../../resources/tags_html5_self_clossing.php';
		$this->htmlInlineTags = __DIR__ . '/../../resources/tags_html5_inline.php';
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

}