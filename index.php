<?php
/**
 * index.php
 *
 * Where it starts.
 *
 * @package UCMS
 * @subpackage Font-end
 **/

define('IN_UCMS', true);

/* define the path of the main UCMS code and the data */
define('__UCMS__', "");
define('__DATA__', "data/");
define('__TPL__', "tpl/");

/* return if included in admin panel */
if (defined('IN_AP')) return;

/* explode the url */
if (array_key_exists('path', $_GET)) {
	$path = explode("/", $_GET['path']);
} else {
	$path[0] = "index";
}

/* include files */
require __UCMS__.'inc/config.inc.php';
require __UCMS__.'inc/main.inc.php';


/* start displaying the page */
switch ($config->pages->$path[0]->type) {
	case 'page':
		if ( ! $page = simplexml_load_file(__DATA__."${path[0]}.xml") ) {
			exit("ERROR: Unable to load data \"${path[0]}.xml\".");
		} else {
			echo generate_page($path[0], $config, $page);
		}
	break;

	default:
		exit("404 Not Found");
	break;
}

?>
