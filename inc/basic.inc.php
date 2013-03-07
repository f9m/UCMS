<?php if (!defined('IN_UCMS')) exit('Access Denied');
/**
 * basic.inc.php
 *
 * Basic functions
 *
 * @package UCMS
 * @subpackage includes
 **/


/**
 * Clean URL
 *
 * @param string $text
 * @return string
 */
function clean_url($text)  {
	$text = strip_tags(lowercase($text));
	$code_entities_match = array(' ?',' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=','.');
	$code_entities_replace = array('','-','-','','','','','','','','','','','','','','','','','','','','','','','','');
	$text = str_replace($code_entities_match, $code_entities_replace, $text);
	$text = urlencode($text);
	$text = str_replace('--','-',$text);
	$text = rtrim($text, "-");
	return $text;
}


/**
 * Convert HTML
 *
 * Convert HTML to store in XML.
 *
 * @param string $string
 * @return string
 */
function cHTML($string) {
	$string = htmlentities($string, ENT_QUOTES, "UTF-8");
	return $string;
}


?>
