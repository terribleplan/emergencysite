<?php
die("Not implemented yet");
require('include.php');

$p = null;
$db = new Database();

$authAttempt = false;
if (isset($_POST['login'])) {
	if (isset($_POST['user'])) {
		if (isset($_POST['pass'])) {
			//TODO: Process the user login attempt.
		} else {
			$authAttempt = true;
		}
	} else {
		$authAttempt = true;
	}
}
if ($authAttempt) {
	//TODO: Display failed login page
}

if (isset($p)) {
	//TODO: Actually handle the user's input.
} else {
	//TODO: Display an interface for submitting a "whatever".
}