<?php declare(strict_types=1);

/**
 * Displays each unprocessed episode, one by one.
 * For helping me parse the music out and put it in a separate field.
 */

use Propel\Runtime\ActiveQuery\Criteria; 

require_once(__DIR__.'/ui.php');

function stripAndAddHTTPS(string $url) {
	return 'https://'.str_replace(['http://', 'https://'], '', $url);
}

// places we link to
$linkPlaces = [
    'Bandcamp',
    'Facebook',
    'Instagram',
    'iTunes',
    'Soundcloud',
    'Spotify',
    'Twitter',
    'YouTube',
    'Website',
    'Label'
];

$fields = [
    'title' => 'setTitle',
    'artist' => 'setArtist',
    'notes' => 'setNotes',
    'track' => 'setTrackNumber'
];

if (!empty($_POST['id'])) {
	$songs = [];
	foreach ($_POST['songs'] as $post) {
		$song = new Song();
		
		foreach ($fields as $field => $func) {
			$val = null;
			if (isset($post[$field])) {
				$val = trim($post[$field]);
			}
			if ($val) {
				$song->$func($val);
			}
		}

		foreach ($linkPlaces as $place) {
			$url = null;
			if (isset($post[$place])) {
				$url = trim($post[$place]);
			}
			if ($url) {
				$link = new SongLink();
				$link->setUrl(stripAndAddHTTPS($url));
				$link->setTitle($place);
				$song->addSongLink($link);
			}
		}
		
		if ($song->getArtist()) {
			$songs[] = $song;
		}
	}
	if ($songs) {
		$id = $_POST['id'];
		$saveEpisode = EpisodeQuery::create()
			->findOneById($id);
		if (!$saveEpisode) {
			throw new RuntimeException('cant find id '.$id);
		}
		$saveEpisode->setProcessed(2);

		foreach ($songs as $song) {
			$saveEpisode->addSong($song);
		}
	}
	$saveEpisode->save();
	// redirect so we dont accidentally refresh and duplicate data
	header('Location: /admin/parse-songs'); 
	die;
}

if (!empty($_POST['id2'])) {
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
	die();
	$saveEpisode->save();
}
// highlight all instances of search terms
$desc = null;
//if ($episode) {
//	$desc = preg_replace('/(music|song|track)/i', '<mark>$1</mark>', $episode->getDescription());
//}
$template->assign('desc', $desc);
// save above for later

// get next ep to work on
$episode = EpisodeQuery::create()
	->filterByMusic(null, Criteria::NOT_EQUAL)
	->filterByProcessed(2, Criteria::LESS_THAN) // 2 = done this step
	->findOne();

// stats for progress bar
$totalEps = EpisodeQuery::create()
	->filterByMusic(null, Criteria::NOT_EQUAL)
	->filterByProcessed(1) 
	->count();
$completeEps = EpisodeQuery::create()
	->filterByProcessed(2) 
	->count();
$template->assign('totalEps', $totalEps);
$template->assign('completeEps', $completeEps);

$template->assign('linkPlaces', $linkPlaces);

$template->assign('ep', $episode);

$template->display('admin/parse-songs.tpl');