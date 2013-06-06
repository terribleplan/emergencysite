<?php
$settings = array(
	'type' => 'Emergency Site Software',
	'pmloc'=>'https://emergencysitesoftware.com/',
	'relloc' => '/',
	'tagline' => 'A steady stream of code to host a simple website with.',
	'exittext' => ' Thanks! <br /> Goodbye.',
	'moretext' => ' I want to know <br /> more.',
	'exitlink' => 'http://google.com/',
	'submitlink' => 'mailto:submit@emergencysitesoftware.com',
	'db' => array(
		'type' => 'php',
		'host' => 'localhost',
		'file' => 'EsS.sqlite',
		'user' => 'EmSiSo',
		'pass' => 'DaBaPas',
		'datb' => 'EmergSite',
		'prfx' => 'ESS_',
		'subm' => false,
		'tabl' => array(
			'users' => 'users',
			'colors' => 'colors',
			'phrases' => 'phrases',
			'submitted' => 'submitted'
		),
		'encr' => array(
			'useEncryption' => false,
			'encryptionKey' => 'thisIsAWeakSauceEncryptionKey',
			'useSalt' => false,
			'salt' => 'thisSaltIsSpoiled'
		),
	),
);
/* By removing the following line you agree to the license. */
die("You must edit settings.php before you can use this software.");
