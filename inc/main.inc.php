<?php if (!defined('IN_UCMS')) exit('Access Denied');
/**
 * main.inc.php
 *
 * Include the function files.
 *
 * @package UCMS
 * @subpackage includes
 **/


/* Fix magic quotes */
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}


/* Include files */
require __UCMS__.'inc/basic.inc.php';
require __UCMS__.'inc/display.inc.php';

?>
