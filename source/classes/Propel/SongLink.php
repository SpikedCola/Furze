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
	
	/**
	 * Places we link to. Note there is a similar list in parse-songs.js that controls which domain matches which link place.
	 * There also must be a matching image file in /images/links/, see getImage().
	 */
	public const PROVIDERS = [
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
	
	/**
	 * Get the image associated with this song's provider.
	 * 
	 * @return string
	 */
	public function getImage() : string {
		$image = strtolower($this->getTitle());
		// some specific overrides for ublock.
		switch ($image) {
			case 'youtube':
				$image = 'yt';
				break;
			case 'facebook':
				$image = 'fb';
				break;
			case 'instagram':
				$image = 'ig';
				break;
			case 'twitter':
				$image = 'tw';
				break;
		}
		return $image.'.png';
	}
}