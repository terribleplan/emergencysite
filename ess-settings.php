<?php
/* By removing the following line you agree to the license. */
die("You must edit settings.php before you can use this software.");


define('ESS_NAME', 'Emergency Site Software');

define('ESS_LOCATION_PERMANENT', 'http://emergencysitesoftware.com/');
define('ESS_LOCATION_RELATIVE', '/');

define('ESS_EXTENSION_JS', '.js');
define('ESS_EXTENSION_CSS', '.css');

define('ESS_TAGLINE', 'A steady stream of code to host a simple website with.');
define('ESS_EXIT_TEXT', 'Show me <br /> the c0de.');
define('ESS_EXIT_LINK', 'https://github.com/terribleplan/emergencysite');
define('ESS_MORETEXT', 'I want to know <br /> more.');
define('ESS_SUBMITLINK', '/submit.php');

define('ESS_DB_TYPE', 'php');
define('ESS_DB_HOST', 'localhost');
define('ESS_DB_PORT', 3306);
define('ESS_DB_FILE', 'EsS.sqlite');
define('ESS_DB_USER', 'EmSiSo');
define('ESS_DB_PASS', 'DaBaPas');

define('ESS_DB_DATABASE', 'EmergSite');
define('ESS_DB_PREFIX', 'ESS_');
define('ESS_DB_ALLOWSUBMIT', false);

define('ESS_DB_TBL_USERS', ESS_DB_PREFIX . 'users');
define('ESS_DB_TBL_COLORS', ESS_DB_PREFIX . 'colors');
define('ESS_DB_TBL_PHRASES', ESS_DB_PREFIX . 'phrases');
define('ESS_DB_TBL_SUBMITTED', ESS_DB_PREFIX . 'submitted');