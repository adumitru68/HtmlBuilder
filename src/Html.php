<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 12/8/2018
 * Time: 4:09 AM
 */

namespace Qpdb\HtmlBuilder;


use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Abstracts\HtmlFieldset;
use Qpdb\HtmlBuilder\Elements\HtmlA;
use Qpdb\HtmlBuilder\Elements\HtmlArticle;
use Qpdb\HtmlBuilder\Elements\HtmlAside;
use Qpdb\HtmlBuilder\Elements\HtmlButton;
use Qpdb\HtmlBuilder\Elements\HtmlDataList;
use Qpdb\HtmlBuilder\Elements\HtmlDiv;
use Qpdb\HtmlBuilder\Elements\HtmlFooter;
use Qpdb\HtmlBuilder\Elements\HtmlForm;
use Qpdb\HtmlBuilder\Elements\HtmlHead;
use Qpdb\HtmlBuilder\Elements\HtmlHeader;
use Qpdb\HtmlBuilder\Elements\HtmlImg;
use Qpdb\HtmlBuilder\Elements\HtmlInput;
use Qpdb\HtmlBuilder\Elements\HtmlLabel;
use Qpdb\HtmlBuilder\Elements\HtmlLegend;
use Qpdb\HtmlBuilder\Elements\HtmlLi;
use Qpdb\HtmlBuilder\Elements\HtmlNav;
use Qpdb\HtmlBuilder\Elements\HtmlOl;
use Qpdb\HtmlBuilder\Elements\HtmlP;
use Qpdb\HtmlBuilder\Elements\HtmlPlainText;
use Qpdb\HtmlBuilder\Elements\HtmlSection;
use Qpdb\HtmlBuilder\Elements\HtmlSelect;
use Qpdb\HtmlBuilder\Elements\HtmlSpan;
use Qpdb\HtmlBuilder\Elements\HtmlTable;
use Qpdb\HtmlBuilder\Elements\HtmlTd;
use Qpdb\HtmlBuilder\Elements\HtmlTemplate;
use Qpdb\HtmlBuilder\Elements\HtmlTextarea;
use Qpdb\HtmlBuilder\Elements\HtmlTh;
use Qpdb\HtmlBuilder\Elements\HtmlTr;
use Qpdb\HtmlBuilder\Elements\HtmlUl;
use Qpdb\HtmlBuilder\Elements\HtmlView;
use Qpdb\HtmlBuilder\Elements\Parts\CustomElement;
use Qpdb\HtmlBuilder\Elements\Parts\DatalistOption;
use Qpdb\HtmlBuilder\Elements\Parts\InputNumber;
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
	 * @param null|string $label
	 * @return HtmlA
	 * @throws HtmlBuilderException
	 */
	public static function a( $label = null ) {
		return new HtmlA( $label );
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
			$img->src( $src );
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

	/**
	 * @return HtmlButton
	 * @throws HtmlBuilderException
	 */
	public static function button() {
		return new HtmlButton();
	}

	/**
	 * @return HtmlArticle
	 * @throws HtmlBuilderException
	 */
	public static function article() {
		return new HtmlArticle();
	}

	/**
	 * @return HtmlAside
	 * @throws HtmlBuilderException
	 */
	public static function aside() {
		return new HtmlAside();
	}

	/**
	 * @return HtmlFooter
	 * @throws HtmlBuilderException
	 */
	public static function footer() {
		return new HtmlFooter();
	}

	/**
	 * @return HtmlSection
	 * @throws HtmlBuilderException
	 */
	public static function section() {
		return new HtmlSection();
	}

	/**
	 * @return HtmlHead
	 * @throws HtmlBuilderException
	 */
	public static function head() {
		return new HtmlHead();
	}

	/**
	 * @return HtmlHeader
	 * @throws HtmlBuilderException
	 */
	public static function header() {
		return new HtmlHeader();
	}

	/**
	 * @return HtmlP
	 * @throws HtmlBuilderException
	 */
	public static function p() {
		return new HtmlP();
	}

	/**
	 * @return HtmlTable
	 * @throws HtmlBuilderException
	 */
	public static  function table() {
		return new HtmlTable();
	}

	/**
	 * @return HtmlTr
	 * @throws HtmlBuilderException
	 */
	public static function tr() {
		return new HtmlTr();
	}

	/**
	 * @return HtmlTd
	 * @throws HtmlBuilderException
	 */
	public static  function td() {
		return new HtmlTd();
	}

	/**
	 * @return HtmlTh
	 * @throws HtmlBuilderException
	 */
	public static function th() {
		return new HtmlTh();
	}

	/**
	 * @return HtmlUl
	 * @throws HtmlBuilderException
	 */
	public static function ul() {
		return new HtmlUl();
	}

	/**
	 * @return HtmlOl
	 * @throws HtmlBuilderException
	 */
	public static function ol() {
		return new HtmlOl();
	}

	/**
	 * @return HtmlLi
	 * @throws HtmlBuilderException
	 */
	public static function li() {
		return new HtmlLi();
	}

	/**
	 * @return HtmlFieldset
	 * @throws HtmlBuilderException
	 */
	public static function fieldset() {
		return new HtmlFieldset();
	}

	/**
	 * @return HtmlLegend
	 * @throws HtmlBuilderException
	 */
	public static function legend() {
		return new HtmlLegend();
	}

	/**
	 * @return HtmlNav
	 * @throws HtmlBuilderException
	 */
	public static function nav() {
		return new HtmlNav();
	}

	/**
	 * @param null $value
	 * @return DatalistOption
	 * @throws CommonException
	 * @throws HtmlBuilderException
	 */
	public static function optionData($value = null) {
		return new DatalistOption($value);
	}

	/**
	 * @return HtmlDataList
	 * @throws HtmlBuilderException
	 */
	public static function datalist() {
		return new HtmlDataList();
	}

}
