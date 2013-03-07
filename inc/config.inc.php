<?php if (!defined('IN_UCMS')) exit('Access Denied');
/**
 * config.inc.php
 *
 * Load the config data.
 *
 * @package UCMS
 * @subpackage includes
 **/

if ( ! $config = simplexml_load_file(__DATA__.'_config.xml') ) {
	exit('ERROR: Unable to load configuration file.');
} else {

}

?>
