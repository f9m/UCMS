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

/* explode the url */
$path = explode("/", $_GET[path]);

/* include files */
require __UCMS__.'inc/config.inc.php';
require __UCMS__.'inc/main.inc.php';

if ($path[0] == "") $path[0] = "index";

echo $path[0];

switch ($config->pages->$path[0]->type) {
	case page:
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
