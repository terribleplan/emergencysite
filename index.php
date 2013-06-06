<?php
include_once('settings.php');
include_once('lib/db.php');
include_once('lib/db_'.$settings['db']['type'].'.php');
include_once('lib/color.php');

/* Changelog is in README.md
 * TODO list:
 * 
 * 0.2:
 * SQLite Database class
 * Submission page
 * 
 * 0.3:
 * Admin page
 * 
 * 0.4:
 * MySQL PDO Database class
 * 
 * 0.5:
 * Installer
 * 
 * 0.6:
 * Other databases?
 * 
 */

//initial setup
$db = new database($settings);
$clr = new color($db);
$q = null;
$c = null;

if(isset($_GET['q'])) {
	$q = $_GET['q'];
}

if(isset($_GET['c'])) {
	$c = $_GET['c'];
} else {
	$c = "nocolor";
}

$output = "";

if (isset($q)) {
	/* API:
	 * c= color, nocolor
	*       assumes nocolor
	*/
	header('Content-type: application/json');
	$output = '{"result":"';
	if ($db->ready()) {

		$output .= 'success","content":"';

		if (is_int($q) && $db->hasPhrase($q)) {
			$output .= $db->getPhrase($q);
		} else {
			$output .= $db->getPhrase(-1);
		}

		if ($c == 'color') {
			$output .= '","color":"' . $clr->rgbCSS();
		}

	} else {

		$output .= 'failure';

	}

	$output .= '"}';

} else {

	$output = "<html>\n<head>\n\t<title>" . strtolower($settings['type']) . " : " .
			$settings['tagline']."</title>\n\t<meta property=\"og:title\" content=\"" . $settings['type'] .
			"\"/>\n\t<meta property=\"og:type\" content=\"website\" />\n\t<meta property=\"og:description\" content=\"" .
			$settings['tagline'] . "\" />\n\t<meta property=\"og:url\" content=\"" . $settings['pmloc']."\" />\n" .
			"\t<script src=\"lib/jquery.min.js\"></script>\n\t<script src=\"site.js\"></script>\n\t<script type=\"text/javascript\">var beg =\"" .
			$settings['relloc'] . "\";</script>\n\t<link rel=\"stylesheet\" type=\"text/css\" href=\"site.css\">\n\t<style type=\"text/css\">body{background-color:" .
			$clr->html() . ";}</style>\n</head>\n<body>\n\t<div class=\"main\">\n\t\t<div class=\"top\">\n\t\t\t<div class=\"title\"><h2>" .
			strtolower($settings['type']) . "</h2></div>\n\t\t\t<div class=\"corner\">\n\t\t\t\t<div class=\"submit\"><a href=\"" .
			$settings['submitlink'] . "\">submit your own</a></div>\n\t\t\t\t<div class=\"share\"></div>\n\t\t\t</div>\n\t</div>\n\t\t<div class=\"content\">" .
			$db->getPhrase(-1) . "</div>\n\t\t<div class=\"bottom\">\n\t\t\t<div class=\"done\"><a href=\"" . $settings['exitlink'] .
			"\">".$settings['exittext'] . "</a></div>\n\t\t\t<div class=\"more\"><a href=\"#\" onclick=\"loadAnother();\">" .
			$settings['moretext'] . "</a></div>\n\t\t</div>\n\t</div>\n</body>\n</html>";

}

die ($output);