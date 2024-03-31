<?php declare(strict_types=1);

/**
 * Download a csv of all the songs, formatted similarly to the index table.
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2024-03-30
 */

use Propel\Runtime\ActiveQuery\Criteria;

use Propel\Runtime\Map\TableMap;

require_once(__DIR__.'/ui.php');

$songs = SongQuery::create()
	->joinWithEpisode()
	->useEpisodeQuery()
		->filterByProcessed(true)
		->orderByUploadedDatetime(Criteria::DESC)
	->endUse()
	->orderByTrackNumber(Criteria::ASC)
	->find();

$filename = 'colinfurzemusic_'.Util::NowUTC('Y-m-d_H-i-s').'.csv';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$episodeFields = [
    'Video ID' => 'id',
    'Video Title' => 'title',
    'Upload Datetime' => 'uploaded_datetime',
];
$songFields = [
    'Song' => 'title',
    'Artist' => 'artist',
    'Track #' => 'track_number'
];
// include all song links available for each song.
$headers = array_merge(
	array_keys($episodeFields),
	array_keys($songFields),
	SongLink::PROVIDERS
);

$fp = fopen('php://output', 'w');
// headers
fputcsv($fp, $headers);
// rows
foreach ($songs as $song) {
	$episode = $song->getEpisode();
	$songLinks = $song->getSongLinks();
	$row = [];
	foreach ($episodeFields as $field) {
		$val = $episode->getByName($field, TableMap::TYPE_FIELDNAME);
		if ('uploaded_datetime' === $field) {
			$val = $val->format('c');
		}
		$row[] = $val;
	}
	foreach ($songFields as $field) {
		$row[] = $song->getByName($field, TableMap::TYPE_FIELDNAME);
	}
	foreach (SongLink::PROVIDERS as $provider) {
		$link = '';
		foreach ($songLinks as $songLink) {
			if ($provider === $songLink->getTitle()) {
				$link = $songLink->getUrl();
				break;
			}
		}
		$row[] = $link;
	}
	fputcsv($fp, $row);
}
fclose($fp);