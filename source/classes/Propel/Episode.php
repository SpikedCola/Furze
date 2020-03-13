<?php

use Base\Episode as BaseEpisode;

/**
 * Skeleton subclass for representing a row from the 'episodes' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Episode extends BaseEpisode {
	public static function CreateFromJSON(object $json) {
		$ep = new Episode();
		$ep->setId($json->id);
		$ep->setUploadDate($json->upload_date);
		$ep->setTitle($json->title);
		$ep->setDescription($json->description);
		return $ep;
	}
}
