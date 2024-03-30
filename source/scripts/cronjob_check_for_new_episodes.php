<?php declare(strict_types=1);

/**
 * Fetch a list of videos from playlist, and save any new ones. 
 * Note that we do not update existing rows.
 * 
 * Send an email with a list of new videos.
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2020-04-03
 */

require_once(__DIR__.'/inc.php');

use Propel\Runtime\Map\TableMap;

echo "[".Util::NowUTC('c')."] starting\n";

$client = new Google_Client();
$client->setApplicationName(GOOGLE_APPLICATION_NAME);
$client->setDeveloperKey(GOOGLE_API_KEY);

$service = new Google_Service_YouTube($client);

$queryParams = [
    'maxResults' => 50, // per page
    'playlistId' => COLIN_FURZE_UPLOADS_PLAYLIST
];

// fetch all videos with pagination, then process.
echo "\nfetch videos from playlist ".COLIN_FURZE_UPLOADS_PLAYLIST."\n";
$videos = [];
$page = 0;
do {
	$page++;
	echo "page {$page}...";
	$response = $service->playlistItems->listPlaylistItems('snippet', $queryParams);
	
	if ($response->items) {
		foreach ($response->items as $item) {
			$videoId = $item->snippet->resourceId->videoId;
			$videos[$videoId] = [
			    'id' => $videoId,
			    'title' => $item->snippet->title,
			    'description' => $item->snippet->description,
			    'uploaded_datetime' => $item->snippet->publishedAt
			];
		}
		echo " ".count($response->items)." videos\n";
	}

	// paginate
	$token = $response->getNextPageToken();
	$queryParams['pageToken'] = $token;
}
while ($token);
$count = count($videos);
echo "done fetching, got {$count} videos\n\n";

$insertedVideos = [];
echo "process videos\n";
foreach ($videos as $videoId => $video) {
	$episode = EpisodeQuery::create()
		->filterById($videoId)
		->findOneOrCreate();
	// note we are ignoring/not updating existing videos.
	if ($episode->isNew()) {
		echo "** video {$videoId} is new";
		$episode
			->fromArray($video, TableMap::TYPE_FIELDNAME)
			->save();
		echo " -> inserted\n";
		$insertedVideos[$videoId] = $video;
	}
}
echo "done processing videos\n";

if ($insertedVideos) {
	echo "\nemailing new videos...";
	Email::SendHtml(
		['parkinglotlust@gmail.com'], 
		'New Colin Furze Video To Be Processed', 
		"<a href=\"https://www.colinfurzemusic.com/admin/\">CFM Admin</a><br /><br />New videos to process:<br />".nl2br(print_r($insertedVideos, true))
	);
	echo " ok\n";
}

echo "\n[".Util::NowUTC('c')."] done\n";