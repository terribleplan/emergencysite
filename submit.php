<?php
die("Not implemented yet");
require('include.php');

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