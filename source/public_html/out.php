<?php declare(strict_types=1);

/**
 * uBlock hides links that go to youtube/etc. Bounce through us first.
 * Probably unnecessary but I'd like it to work with my own browser setings.
 */

require_once(__DIR__.'/ui.php');

// default redirect to self. eg. http://www.colinfurzemusic.com
$redirect = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']; 

// ideally redirect to a specific link
$id = (int)$_GET['id'] ?? null;
if ($id) {
	$link = SongLinkQuery::create()
		->findPk($id);


	if ($link) {
		$redirect = $link->getUrl();
	}
}

header("Location: {$redirect}");
die;