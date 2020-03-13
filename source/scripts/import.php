<?php declare(strict_types=1);

require_once(__DIR__.'/inc.php');

$jsonDir = 'D:\furze json';

$files = glob($jsonDir.DIRECTORY_SEPARATOR.'*.json');

foreach ($files as $file) {
	var_dump($file);
	if (!$json = json_decode(file_get_contents($file))) {
		throw new RuntimeException('json didnt decode for file '.$file);
	}
	
	$ep = Episode::CreateFromJSON($json);
	$ep->save();
}