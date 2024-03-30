<?php declare(strict_types=1);

/**
 * Displays each unprocessed episode, one by one.
 * For helping me parse the music out and put it in a separate field.
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2020-04-03
 */

use Propel\Runtime\Map\TableMap;

require_once(__DIR__.'/ui.php');

function stripAndAddHTTPS(string $url) {
	return 'https://'.str_replace(['http://', 'https://'], '', $url);
}

// places we link to.
// note there is a similar list in parse-songs.js that controls which domain matches which link place.
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

// field on Song that can be set.
$fields = [
    'title',
    'artist',
    'notes',
    'track_number'
];

if (!empty($_POST['id'])) {
	$id = $_POST['id'];
	$songs = [];
	foreach ($_POST['songs'] as $post) {
		$song = new Song();
		
		foreach ($fields as $field) {
			if (!isset($post[$field])) {
				continue;
			}
			$val = trim($post[$field]);
			if ($val) {
				$song->setByName($field, $val, TableMap::TYPE_FIELDNAME);
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
		
		// ignoring songs that dont have an artist set?
		if ($song->getArtist()) {
			$songs[] = $song;
		}
	}
	$saveEpisode = EpisodeQuery::create()->requireOneById($id);
	// note, we may have 0 songs for an episode.
	foreach ($songs as $song) {
		$saveEpisode->addSong($song);
	}
	$saveEpisode
		->setProcessed(true)
		->save();
	// redirect so we dont accidentally refresh and duplicate data
	header('Location: /admin/parse-songs'); 
	die;
}

// get next ep to work on
$episode = EpisodeQuery::create()
	->filterByProcessed(false)
	->findOne();

// stats for progress bar
$todoEps = EpisodeQuery::create()
	->filterByProcessed(false) 
	->count();
$completeEps = EpisodeQuery::create()
	->filterByProcessed(true) 
	->count();

$template->assign([
    'totalEps' => $todoEps+$completeEps,
    'completeEps' => $completeEps,
    'linkPlaces' => $linkPlaces,
    'ep' => $episode
]);

$template->js('jquery-3.6.0.min.js');
$template->js('admin/parse-songs.js');
$template->css('admin/parse-songs.css');

$template->display('admin/parse-songs.tpl');