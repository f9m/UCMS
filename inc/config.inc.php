<?php if (!defined('IN_UCMS')) exit('Access Denied');
/**
 * config.inc.php
 *
 * Load config data and define default settings.
 *
 * @package UCMS
 * @subpackage includes
 **/
//TODO: if index dosen't exists?

if ( ! $config = simplexml_load_file(__DATA__.'_config.xml') ) {
	exit('ERROR: Unable to load configuration file.');
}

if ( ! isset($config->settings->language) || $config->settings->language == "" ) {
	$config->settings->language = "zh_tw";
}

include __UCMS__.'lang/'.(string)$config->settings->language.'.inc.php';


$config_settings = array(

	'language',
	'dir_base',
	'site_name',
	'owner_name',
	'show_index_title',
	'title_delimiter',
	'small_nav_delimiter',
	'nav_divid',
	'nav_display_links_on_footer',
	'global_show_aside',

	'site_description',
	'custom_meta',
	'global_head',
	'global_foot',
	'global_aside',
	'copyright',

);

$config_rs_defaults = array(

	'dir_base' => '/',
	'site_name' => $lang['default_site_name'],
	'owner_name' => $lang['default_owner_name'],
	'show_index_title' => 'false',
	'title_delimiter' => ' | ',
	'small_nav_delimiter' => '．',
	'nav_display_links_on_footer' => 'true',
	'global_show_aside' => 'false',

);


foreach ($config_settings as $value) {
	if ( ! isset($config->settings->$value) ) {
		$config->settings->$value = "";
	}
}

foreach ($config_rs_defaults as $key => $value) {
	if ( $config->settings->$key == "" ) {
		$config->settings->$key = $value;
	}
}


if  ( ! isset($config->pages->index) ) {

}

?>
