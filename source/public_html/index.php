<?php declare(strict_types=1);

/**
 * Display all songs in a table
 */

use Propel\Runtime\ActiveQuery\Criteria; 

require_once(__DIR__.'/ui.php');


$episodes = EpisodeQuery::create()
	->filterByMusic(null, Criteria::NOT_EQUAL)
	->orderByUploadDate(Criteria::DESC)
	->find();

$template->assign('episodes', $episodes);
$template->display('index.tpl');