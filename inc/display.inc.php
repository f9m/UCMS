<?php if (!defined('IN_UCMS')) exit('Access Denied');
/**
 * display.inc.php
 *
 * Display functions
 *
 * @package UCMS
 * @subpackage Font-end
 **/


function generate_page($page_name, $config, $page) {
	if ( !$html = file_get_contents(__TPL__.'main.html') ) {
		exit("ERROR: failed to open template \"".__TPL__.'main.html'."\".");
	} else {
		if ((string)$config->settings->global_show_aside == 'false' || (string)$page->show_aside == 'false') {
			$html = str_replace('</head>', "  <style> .aside-wrapper, .aside { display: none; } </style></head>", $html);
		}

		$html = str_replace('{TITLE}', display_title($page_name, (string)$page->title, (string)$config->settings->site_name, (string)$config->settings->title_delimiter, (string)$config->settings->show_index_title), $html);
		$html = str_replace('{DESCRIPTION}', display_description((string)$page->description, (string)$config->settings->site_description), $html);
		$html = str_replace('</head>', (string)$config->settings->custom_meta."\n</head>", $html);

		$html = str_replace('{NAV}', display_nav($page_name, $config->pages, $config->settings->nav_divid, $config->settings->dir_base), $html);
		$html = str_replace('{NAV_S}', display_small_nav($config->pages, $config->settings->small_nav_delimiter, $config->settings->dir_base), $html);

		$html = str_replace('{COPYRIGHT}', display_copyright((string)$config->settings->copyright, (string)$config->settings->owner_name), $html);

		if ($config->settings->global_show_aside == 'true') {
			$html = str_replace('{ASIDE}', (string)$config->settings->global_head, $html);
		} else {
			$html = str_replace('{ASIDE}', '', $html);
		}
		$html = str_replace('{HEAD}', (string)$config->settings->global_head, $html);
		$html = str_replace('{FOOT}', (string)$config->settings->global_foot, $html);
		$html = str_replace('{CONTENT}', (string)$page->content, $html);

		return $html;
	}

}


function display_title($page_name, $title, $site_name, $title_delimiter, $show_index_title) {
	if ($page_name == 'index' && $show_index_title == 'false') {
		return $site_name;
	} else {
		return $title.$title_delimiter.$site_name;
	}
}


function display_description($description, $default) {
	if ($description != '') return $description;
	else return $default;
}


function display_nav($current_page, $pages, $nav_divid, $dir_base) {
	$nav_id_max = 0;
	$n = 0;
	$return = "";

	$pages = is_object($pages) ? get_object_vars($pages) : $pages;
	foreach ($pages as $name => $data) {
		$data = is_object($data) ? get_object_vars($data) : $data;
		if ($data['id'] > $nav_id_max) $nav_id_max = $data['id'];
		$nav[$data['id']] = $data;
		$nav[$data['id']]['name'] = $name;
	}

	for ($i=0; $i<=$nav_id_max; $i++) {
		if (array_key_exists($i, $nav)) {
			$url = ($nav[$i]['name'] == 'index') ? $dir_base : $dir_base.$nav[$i]['name'];
			$title = $nav[$i]['title'];
			if ($nav_divid == 2 || ($nav_divid == 1 && $n > 0)) {
				$return = $return."<li class=\"divider-vertical\"></li>";
			}
			if ($nav[$i]['name'] == $current_page) $return = $return."<li class=\"active\">";
			else $return = $return."<li>";
			$return = $return."<a href=\"$url\">$title</a>";
			$return = $return."</li>";

			$n += 1;
		}
	}
	if ($nav_divid == 2) {
		$return = $return."<li class=\"divider-vertical\"></li>";
	}

	return $return;
}


function display_small_nav($pages, $nav_divid, $dir_base) {
	$nav_id_max = 0;
	$n = 0;
	$return = "<br>";

	$pages = is_object($pages) ? get_object_vars($pages) : $pages;
	foreach ($pages as $name => $data) {
		$data = is_object($data) ? get_object_vars($data) : $data;
		if ($data['id'] > $nav_id_max) $nav_id_max = $data['id'];
		$nav[$data['id']] = $data;
		$nav[$data['id']]['name'] = $name;
	}


	for ($i=0; $i<=$nav_id_max; $i++) {
		if (array_key_exists($i, $nav)) {
			$url = ($nav[$i]['name'] == 'index') ? $dir_base : $dir_base.$nav[$i]['name'];
			$title = $nav[$i]['title'];
			if ($n > 0) {
				$return = $return.$nav_divid;
			}
			$return = $return."<a href=\"$url\">$title</a>";
			$n += 1;
		}
	}

	return $return;
}


function display_copyright($copyright, $owner) {
	if ($copyright != '') {
		return $copyright;
	} else {
		$today = getdate();
		return '&copy; '.$owner.' '.$today['year'];
	}
}

?>
