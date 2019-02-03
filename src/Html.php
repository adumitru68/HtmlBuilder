<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/8/2018
 * Time: 4:09 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Elements\HtmlDiv;
use Qpdb\HtmlBuilder\Elements\HtmlForm;
use Qpdb\HtmlBuilder\Elements\HtmlImg;
use Qpdb\HtmlBuilder\Elements\HtmlInput;
use Qpdb\HtmlBuilder\Elements\HtmlLabel;
use Qpdb\HtmlBuilder\Elements\HtmlPlainText;
use Qpdb\HtmlBuilder\Elements\HtmlSelect;
use Qpdb\HtmlBuilder\Elements\HtmlSpan;
use Qpdb\HtmlBuilder\Elements\HtmlTemplate;
use Qpdb\HtmlBuilder\Elements\HtmlTextarea;
use Qpdb\HtmlBuilder\Elements\HtmlView;
use Qpdb\HtmlBuilder\Elements\Parts\CustomElement;
use Qpdb\HtmlBuilder\Elements\Parts\SelectOptgroup;
use Qpdb\HtmlBuilder\Elements\Parts\SelectOption;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;

class Html
{

	/**
	 * @param string $tag
	 * @return CustomElement
	 * @throws HtmlBuilderException
	 */
	public static function create( $tag ) {
		return new CustomElement( $tag );
	}

	/**
	 * @return CustomElement
	 * @throws HtmlBuilderException
	 */
	public static function container() {
		return new CustomElement( '' );
	}

	/**
	 * @return HtmlDiv
	 * @throws HtmlBuilderException
	 */
	public static function div() {
		return new HtmlDiv();
	}

	/**
	 * @param null $src
	 * @return HtmlImg
	 * @throws HtmlBuilderException
	 * @throws CommonException
	 */
	public static function img( $src = null ) {
		$img = new HtmlImg();
		if ( !empty( $src ) ) {
			$img->withSrc( $src );
		}

		return $img;
	}

	/**
	 * @param null $labelText
	 * @return HtmlLabel
	 * @throws HtmlBuilderException
	 */
	public static function label( $labelText = null ) {
		return ( new HtmlLabel() )->withPlainText( $labelText );
	}

	/**
	 * @param mixed ...$texts
	 * @return HtmlPlainText
	 * @throws HtmlBuilderException
	 */
	public static function plainText( ...$texts ) {
		return ( new HtmlPlainText() )->withPlainText( $texts );
	}

	/**
	 * @return HtmlTemplate
	 * @throws HtmlBuilderException
	 */
	public static function template() {
		return new HtmlTemplate();
	}

	/**
	 * @return HtmlTextarea
	 * @throws HtmlBuilderException
	 */
	public static function textarea() {
		return new HtmlTextarea();
	}

	/**
	 * @return HtmlView
	 */
	public static function view() {
		return new HtmlView();
	}

	/**
	 * @return HtmlSpan
	 * @throws HtmlBuilderException
	 */
	public static function span() {
		return new HtmlSpan();
	}

	/**
	 * @return SelectOption
	 * @throws HtmlBuilderException
	 */
	public static function option() {
		return ( new SelectOption() );
	}

	/**
	 * @return SelectOptgroup
	 * @throws HtmlBuilderException
	 */
	public static function optgroup() {
		return new SelectOptgroup();
	}

	/**
	 * @return HtmlSelect
	 * @throws HtmlBuilderException
	 */
	public static function select() {
		return new HtmlSelect();
	}

	/**
	 * @return HtmlForm
	 * @throws HtmlBuilderException
	 */
	public static function form() {
		return new HtmlForm();
	}

	/**
	 * @return HtmlInput
	 */
	public static function input() {
		return new HtmlInput();
	}

}
