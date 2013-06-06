<?php
include_once('settings.php');
include_once('lib/db.php');
include_once('lib/db_'.$settings['db']['type'].'.php');

if (!Database::$wri || !$settings['db']['subm']) {
	die("Submissions are currently disabled.");
}

$p = null;
$db = new Database();

if (isset($_POST['p'])) {
	$p = $_POST['p'];
}

if (isset($p)) {
	//TODO: Actually handle the user's input.
} else {
	//TODO: Display an interface for submitting a "whatever".
}
die("In version 0.2");