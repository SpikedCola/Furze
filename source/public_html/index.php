<?php declare(strict_types=1);

/**
 * Display all songs in a table
 */

use Propel\Runtime\ActiveQuery\Criteria; 

require_once(__DIR__.'/ui.php');

$songs = SongQuery::create()
	->useEpisodeQuery()
		->orderByUploadDate(Criteria::DESC)
	->endUse()
	->find();

$template->assign('songs', $songs);
$template->display('index.tpl');