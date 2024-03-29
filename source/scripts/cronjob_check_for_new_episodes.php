<?php declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

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
	sendEmail(['parkinglotlust@gmail.com'], 'New Colin Furze Video To Be Processed', "<a href=\"https://www.colinfurzemusic.com/admin/\">CFM Admin</a><br /><br />New videos to process:<br />".nl2br(print_r($insertedVideos, true)));
}

echo "done\n";

function sendEmail(array $emails, string $subject, string $body) {
	$mail = new PHPMailer(true);
	try {
		$mail->isSMTP();

		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		// SMTP::DEBUG_CLIENT = client messages
		// SMTP::DEBUG_SERVER = client and server messages
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->SMTPAuth = true;

		$mail->Username = GMAIL_USERNAME;
		$mail->Password = GMAIL_PASSWORD;
		$mail->setFrom(GMAIL_FROM_ADDRESS, GMAIL_FROM_NAME);

		$mail->Subject = $subject;
		foreach ($emails as $addr) {
			$mail->addAddress($addr);
		}

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

		$mail->msgHTML($body);
		//$mail->AltBody = 'This is a plain-text message body';

		$mail->send();
	}
	catch (Exception $e) {
		var_dump($e);
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}