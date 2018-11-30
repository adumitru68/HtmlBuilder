<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 11/30/2018
 * Time: 2:12 PM
 */

namespace Qpdb\HtmlBuilder\Helper;


class HtmlDef
{

	const TAG_START_OPEN = '<';
	const TAG_START_CLOSE = '>';
	const TAG_END_OPEN = '</';
	const TAG_END_CLOSE = '>';
	const TAG_SELF_OPEN = '<';
	const TAG_SELF_CLOSE = '>';

	const ATTRIBUTE_ID = 'id';
	const ATTRIBUTE_NAME = 'name';
	const ATTRIBUTE_VALUE = 'value';
	const ATTRIBUTE_CLASS = 'class';
	const ATTRIBUTE_STYLE = 'style';
	const ATTRIBUTE_DATA = 'data';
	const ATTRIBUTE_ALT = 'alt';
	const ATTRIBUTE_TITLE = 'title';
	const ATTRIBUTE_PLACEHOLDER = 'placeholder';
	const ATTRIBUTE_SRC = 'src';

	const CLEAN_ATTRIBUTE_VALUE_NONE = 0;
	const CLEAN_ATTRIBUTE_VALUE_IF_NEEDED = 1;
	const CLEAN_ATTRIBUTE_VALUE_ALWAYS = 2;

	const FORM_ENCTYPE = 'enctype';
	const FORM_ENCTYPE_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';
	const FORM_ENCTYPE_MULTIPART_FORM_DATA = 'multipart/form-data';
	const FORM_ENCTYPE_TEXT_PLAIN = 'text/plain';

	const FORM_METHOD = 'method';
	const FORM_METHOD_POST = 'post';
	const FORM_METHOD_GET = 'get';
	const FORM_ACTION = 'action';

	const FORM_INPUT = 'input';
	const FORM_SELECT = 'select';
	const FORM_TEXATREA = 'textarea';

}