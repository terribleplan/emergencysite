<?php
/*
 * You should have recieved a copy of the BSD 3-clause license with this file.
 * If you cannot find a file named LICENSE it can be obtained from the github
 * repository:
 * https://github.com/terribleplan/emergencysite/blob/master/LICENSE
 */
require_once('ess-include.php');
/* Changelog is in README.md
 * TODO list:
 *
 * 0.3:
 * Admin page
 * Submission page
 *
 * 0.4:
 * More databases
 *
 */
$db = new Database();
$clr = $db->randomColor();
$q = null;
$c = null;
if (isset($_GET['q'])) {
	$q = $_GET['q'];
}
if (isset($_GET['c'])) { 
	if ($_GET['c'] === 'color') {
		$c = 'color';
	} else {
		$c = 'nocolor';
	}
}
if (isset($q)) {
	// API: c=color, <anything else>
	header('Content-type: application/json');
	$output = '{"result":"';
	if ($db->ready()) {
		$phrase = $db->getPhrase(-1);
		$output .= 'success","content":"';
		if (is_int($q)) {
			$phrase = $db->getPhrase($q);
		} else {
			$phrase = $db->getPhrase(-1);
		}
		$output .= $phrase->getPhrase();
		$output .= '","id":"';
		$output .= $phrase->getID();
		if ($phrase->getError() !== false) {
			$output .= '","nf-error":"';
			$output .= $phrase->getError();
		}
		if ($c == 'color') {
			$output .= '","color":"' . $clr->rgbCSS();
		}
	} else {
		$output .= 'failure';
	}
	$output .= '"}';
	die($output);
} else {
?>
<html>
	<head>
		<title><?php print(strtolower(ESS_NAME)); ?> : <?php print(ESS_TAGLINE); ?></title>
		<meta property="og:title" content="<?php print(ESS_NAME); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:description\" content="<?php print(ESS_TAGLINE); ?>" />
		<meta property="og:url" content="<?php print(ESS_LOCATION_PERMANENT); ?>" />
		<script src="<?php print(ESS_LOCATION_PERMANENT); ?>lib/ess-140medley<?php print(ESS_EXTENSION_JS); ?>" type="text/javascript"></script>
		<script src="<?php print(ESS_LOCATION_PERMANENT); ?>lib/ess-json2<?php print(ESS_EXTENSION_JS); ?>" type="text/javascript"></script>
		<script type="text/javascript">var beg = '<?php print(ESS_LOCATION_PERMANENT); ?>';</script>
		<script src="<?php print(ESS_LOCATION_PERMANENT); ?>ess-site<?php print(ESS_EXTENSION_JS); ?>" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php print(ESS_LOCATION_PERMANENT); ?>ess-site<?php print(ESS_EXTENSION_CSS); ?>">
		<style type="text/css">body{background-color:<?php print($clr->html()); ?>;}</style>
	</head>
	<body>
		<div class="main">
			<div class="top">
				<div class="title">
					<h2><?php print(strtolower(ESS_NAME)); ?></h2>
				</div>
				<div class="corner">
					<div class="submit"><a href="<?php print(ESS_SUBMITLINK); ?>">submit your own</a></div>
					<div class="share"></div>
				</div>
			</div>
			<div class="content"><?php print($db->getPhrase(-1)->getPhrase()); ?></div>
			<div class="bottom">
				<div class="done"><a href="<?php print(ESS_EXIT_LINK); ?>"><?php print(ESS_EXIT_TEXT); ?></a></div>
				<div class="more"><a href="#" onclick="loadAnother();"><?php print(ESS_MORETEXT); ?></a></div>
			</div>
		</div>
	</body>
</html>
<?php
die();
}