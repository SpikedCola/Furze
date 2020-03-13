<?php declare(strict_types=1);

/**
 * Displays each unprocessed episode, one by one.
 * For helping me parse the music out and put it in a separate field.
 */

require_once(__DIR__.'/ui.php');

if (!empty($_POST['id'])) {
	$id = $_POST['id'];
	$saveEpisode = EpisodeQuery::create()
		->findOneById($id);
	if (!$saveEpisode) {
		throw new RuntimeException('cant find id '.$id);
	}
	$saveEpisode->setProcessed(true);
	$music = null;
	if (!empty($_POST['music'])) {
		$music = trim($_POST['music']);
	}
	$saveEpisode->setMusic($music);
	$saveEpisode->save();
}

$episode = EpisodeQuery::create()
	->filterByProcessed(0)
	->findOne();

$desc = null;
if ($episode) {
	// highlight all instances of search terms
	$desc = preg_replace('/(music|song|track)/i', '<mark>$1</mark>', $episode->getDescription());
}

$template->assign('ep', $episode);
$template->assign('desc', $desc);

$template->display('admin/index.tpl');