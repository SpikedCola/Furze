<?php declare(strict_types=1);

require_once(__DIR__.'/inc.php');

// videos *seem* to come back newest-to-oldest but i cant find it 
// explicitly documented anywhere. fetch all videos...

// credentials are under classifiedwatch@gmail.com google account
// mine was at limit for projects, deleted a bunch but have to wait 30 days?
// sent a request to unlock, for now see above.

$colinFurzeUploadsPlaylist = 'UUp68_FLety0O-n9QU6phsgw';

$client = new Google_Client();
$client->setApplicationName(GOOGLE_APPLICATION_NAME);
$client->setDeveloperKey(GOOGLE_API_KEY);

$service = new Google_Service_YouTube($client);

$queryParams = [
    'maxResults' => 50,
    'playlistId' => $colinFurzeUploadsPlaylist
];

$videos = [];
$page = 0;
do {
	$page++;
	echo "page {$page}\n";
	$response = $service->playlistItems->listPlaylistItems('snippet', $queryParams);
	
	if ($response->items) {
		foreach ($response->items as $item) {
			$videoId = $item->snippet->resourceId->videoId;
			$title = $item->snippet->title;
			$desc = $item->snippet->description;
			$publishedDatetime = $item->snippet->publishedAt;
			$videos[$videoId] = [
			    'title' => $title,
			    'description' => $desc,
			    'upload_date' => gmdate('Y-m-d', strtotime($publishedDatetime))
			];
		}
	}

	// paginate
	$token = $response->getNextPageToken();
	$queryParams['pageToken'] = $token;
}
while ($token);

$insertedVideos = [];
$count = count($videos);
echo "process {$count} videos\n";
foreach ($videos as $videoId => $video) {
	if (!EpisodeQuery::create()->findPk($videoId)) {
		echo "video {$videoId} is new";
		$ep = Episode::CreateFromArray($videoId, $video);
		$ep->save();
		echo " -> inserted\n";
		$insertedVideos[$videoId] = $video;
	}
}

if ($insertedVideos) {
	echo "report inserted videos\n";
	// @todo send email
}

echo "done\n";