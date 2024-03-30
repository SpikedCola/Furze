<?php declare(strict_types=1);

mb_internal_encoding('UTF-8');

// these are public so they don't need to be in credentials.php.
define('GA_MEASUREMENT_ID', 'G-C5GSGDMQ7W');
define('GOOGLE_ADS_CLIENT_ID', 'ca-pub-8684190640371442');
define('COLIN_FURZE_UPLOADS_PLAYLIST', 'UUp68_FLety0O-n9QU6phsgw');

require_once(__DIR__.'/credentials.php');

// autoload composer classes
require_once(__DIR__.'/vendor/autoload.php');

// propel
require_once(__DIR__.'/propel.php');

// autoload our classes & traits.
spl_autoload_register(function($class) {
	$file = __DIR__."/classes/{$class}.class.php";
	if (file_exists($file)) {
		require_once($file);
	}
	$file = __DIR__."/classes/{$class}.trait.php";
	if (file_exists($file)) {
		require_once($file);
	}
});