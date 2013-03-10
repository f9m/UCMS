<?php
/**
 * admin/index.php
 *
 * The admin panel.
 *
 * @package UCMS
 * @subpackage Back-end
 **/

session_start();
global $config;

define('IN_UCMS', true);
define('IN_AP', true);
$mode = $_GET['mode'];

/* define the path of the main UCMS code and the data */
define('__UCMS__', "../");
define('__DATA__', "../data/");

require __UCMS__.'inc/config.inc.php';
require __UCMS__.'inc/main.inc.php';



switch ($mode) {
	case 'login':
		require 'includes/login.inc.php';
	break;

	case 'pages':
		require 'includes/head.inc.php';
		require 'includes/pages.inc.php';
		require 'includes/foot.inc.php';
	break;

	case 'settings':
		require 'includes/head.inc.php';
		require 'includes/settings.inc.php';
		require 'includes/foot.inc.php';
	break;

	case 'dashboard':
		require 'includes/head.inc.php';
		require 'includes/dashboard.inc.php';
		require 'includes/foot.inc.php';
	break;

	default:
		$mode = 'dashboard';
		require 'includes/head.inc.php';
		require 'includes/dashboard.inc.php';
		require 'includes/foot.inc.php';
	break;
}

?>
