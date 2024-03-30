<?php declare(strict_types=1);

/**
 * Display all songs in a table.
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2020-03-19
 */

use Propel\Runtime\ActiveQuery\Criteria; 

require_once(__DIR__.'/ui.php');

$songs = SongQuery::create()
	->joinWithEpisode()
	->useEpisodeQuery()
		->filterByProcessed(true)
		->orderByUploadedDatetime(Criteria::DESC)
	->endUse()
	->orderByTrackNumber(Criteria::ASC)
	->find();

$template->assign([
    'songs' => $songs
]);
$template->display('index.tpl');