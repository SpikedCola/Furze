<?php

use Base\SongLink as BaseSongLink;

/**
 * Skeleton subclass for representing a row from the 'song_links' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class SongLink extends BaseSongLink {
	use \setCreatedDatetime, \getCreatedDatetimeLocal;
}