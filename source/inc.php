<?php declare(strict_types=1);

mb_internal_encoding('UTF-8');

require_once(__DIR__.'/credentials.php');

// autoload composer classes
require_once(__DIR__.'/classes/vendor/autoload.php');

// propel
require_once(__DIR__.'/propel.php');

// autoload our classes
spl_autoload_register(function($class) {
	$file = __DIR__."/classes/{$class}.class.php";
	if (file_exists($file)) {
		require_once($file);
	}	
});