<?php
//Handle cloudflare
//(should be improved if possible)
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
define('ESS_SERVERSIDE_LOCATION', dirname(__FILE__) . '/');
require_once(ESS_SERVERSIDE_LOCATION . 'ess-settings.php');
require_once(ESS_SERVERSIDE_LOCATION . 'lib/ess-classes.php');
require_once(ESS_SERVERSIDE_LOCATION . 'lib/ess-db_' . ESS_DB_TYPE . '.php');