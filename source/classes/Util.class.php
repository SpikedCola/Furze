<?php declare(strict_types=1);

/**
 * 
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2020-04-24
 */

class Util {
	public static $STATE_LIST = [
	    'ALABAMA' => 'AL',
	    'ALASKA' => 'AK',
	    'ARIZONA' => 'AZ',
	    'ARKANSAS' => 'AR',
	    'CALIFORNIA' => 'CA',
	    'COLORADO' => 'CO',
	    'CONNECTICUT' => 'CT',
	    'DELAWARE' => 'DE',
	    'DISTRICT OF COLUMBIA' => 'DC',
	    'WASHINGTON DC' => 'DC', // silly but it has come up
	    'FLORIDA' => 'FL',
	    'GEORGIA' => 'GA',
	    'HAWAII' => 'HI',
	    'IDAHO' => 'ID',
	    'ILLINOIS' => 'IL',
	    'INDIANA' => 'IN',
	    'IOWA' => 'IA',
	    'KANSAS' => 'KS',
	    'KENTUCKY' => 'KY',
	    'LOUISIANA' => 'LA',
	    'MAINE' => 'ME',
	    'MARYLAND' => 'MD',
	    'MASSACHUSETTS' => 'MA',
	    'MICHIGAN' => 'MI',
	    'MINNESOTA' => 'MN',
	    'MISSISSIPPI' => 'MS',
	    'MISSOURI' => 'MO',
	    'MONTANA' => 'MT',
	    'NEBRASKA' => 'NE',
	    'NEVADA' => 'NV',
	    'NEW HAMPSHIRE' => 'NH',
	    'NEW JERSEY' => 'NJ',
	    'NEW MEXICO' => 'NM',
	    'NEW YORK' => 'NY',
	    'NORTH CAROLINA' => 'NC',
	    'NORTH DAKOTA' => 'ND',
	    'OHIO' => 'OH',
	    'OKLAHOMA' => 'OK',
	    'OREGON' => 'OR',
	    'PENNSYLVANIA' => 'PA',
	    'PUERTO RICO' => 'PR',
	    'RHODE ISLAND' => 'RI',
	    'SOUTH CAROLINA' => 'SC',
	    'SOUTH DAKOTA' => 'SD',
	    'TENNESSEE' => 'TN',
	    'TEXAS' => 'TX',
	    'UTAH' => 'UT',
	    'VERMONT' => 'VT',
	    'VIRGINIA' => 'VA',
	    'WASHINGTON' => 'WA',
	    'WEST VIRGINIA' => 'WV',
	    'WISCONSIN' => 'WI',
	    'WYOMING' => 'WY',
	    'ONTARIO' => 'ON',
	    'QUEBEC' => 'QC',
	    'QUÉBEC' => 'QC',
	    'NOVA SCOTIA' => 'NS',
	    'NEW BRUNSWICK' => 'NB',
	    'NOUVEAU-BRUNSWICK' => 'NB', // damn french
	    'MANITOBA' => 'MB',
	    'BRITISH COLUMBIA' => 'BC',
	    'PRINCE EDWARD ISLAND' => 'PE',
	    'SASKATCHEWAN' => 'SK',
	    'ALBERTA' => 'AB',
	    'NEWFOUNDLAND AND LABRADOR' => 'NL',
	    'NORTHWEST TERRITORIES' => 'NT',
	    'YUKON' => 'YT',
	    'NUNAVUT' => 'NU',
	];
	
	public static $STATE_CODE_LIST = [
	    'AL' => 'Alabama',
	    'AK' => 'Alaska',
	    'AZ' => 'Arizona',
	    'AR' => 'Arkansas',
	    'CA' => 'California',
	    'CO' => 'Colorado',
	    'CT' => 'Connecticut',
	    'DE' => 'Delaware',
	    'DC' => 'District of Columbia',
	    'FL' => 'Florida',
	    'GA' => 'Georgia',
	    'HI' => 'Hawaii',
	    'ID' => 'Idaho',
	    'IL' => 'Illinois',
	    'IN' => 'Indiana',
	    'IA' => 'Iowa',
	    'KS' => 'Kansas',
	    'KY' => 'Kentucky',
	    'LA' => 'Louisiana',
	    'ME' => 'Maine',
	    'MD' => 'Maryland',
	    'MA' => 'Massachusetts',
	    'MI' => 'Michigan',
	    'MN' => 'Minnesota',
	    'MS' => 'Mississippi',
	    'MO' => 'Missouri',
	    'MT' => 'Montana',
	    'NE' => 'Nebraska',
	    'NV' => 'Nevada',
	    'NH' => 'New Hampshire',
	    'NJ' => 'New Jersey',
	    'NM' => 'New Mexico',
	    'NY' => 'New York',
	    'NC' => 'North Carolina',
	    'ND' => 'North Dakota',
	    'OH' => 'Ohio',
	    'OK' => 'Oklahoma',
	    'OR' => 'Oregon',
	    'PA' => 'Pennsylvania',
	    'PR' => 'Puerto Rico',
	    'RI' => 'Rhode Island',
	    'SC' => 'South Carolina',
	    'SD' => 'South Dakota',
	    'TN' => 'Tennessee',
	    'TX' => 'Texas',
	    'UT' => 'Utah',
	    'VT' => 'Vermont',
	    'VA' => 'Virginia',
	    'WA' => 'Washington',
	    'WV' => 'West Virginia',
	    'WI' => 'Wisconsin',
	    'WY' => 'Wyoming',
	    'ON' => 'Ontario',
	    'QC' => 'Quebec',
	    'NS' => 'Nova Scotia',
	    'NB' => 'New Brunswick',
	    'MB' => 'Manitoba',
	    'BC' => 'British Columbia',
	    'PE' => 'Prince Edward Island',
	    'SK' => 'Saskatchewan',
	    'AB' => 'Alberta',
	    'NL' => 'Newfoundland and Labrador',
	    'NT' => 'Northwest Territories',
	    'YT' => 'Yukon',
	    'NU' => 'Nunavut'
	];
	
	/**
	 * List of provinces/territories in Canada. Events sent by 
	 * Prell atm are all "USA" which messes up google lookup. 
	 * Could drop column altogether, or look at state & fixup.
	 * Try fixup first.
	 *
	 * @var array 
	 */
	public static $CANADA_PROV_LIST = [
	    'ON' => 'Ontario',
	    'QC' => 'Quebec',
	    'NS' => 'Nova Scotia',
	    'NB' => 'New Brunswick',
	    'MB' => 'Manitoba',
	    'BC' => 'British Columbia',
	    'PE' => 'Prince Edward Island',
	    'SK' => 'Saskatchewan',
	    'AB' => 'Alberta',
	    'NL' => 'Newfoundland and Labrador',
	    'NT' => 'Northwest Territories',
	    'YT' => 'Yukon',
	    'NU' => 'Nunavut'
	];
	
	/**
	 * List of country -> code mappings.
	 * 
	 * @todo checkout https://github.com/brightnucleus/country-codes
	 * 
	 * @var type 
	 */
	public static $COUNTRY_CODE_LIST = [
	    'CANADA' => 'CA',
	    'UNITED STATES' => 'US',
	    'DEUTSCHLAND' => 'DE'
	];
	
	/**
	 * @var array Array of states that have only one timezone.
	 */
	public static $STATE_TIMEZONE_LIST = [
	    'AL' => 'America/Chicago',
	    'AK' => 'America/Chicago',
	    'CA' => 'America/Los_Angeles',
	    'CO' => 'America/Denver',
	    'CT' => 'America/New_York',
	    'DE' => 'America/New_York',
	    'DC' => 'America/New_York',
	    'GA' => 'America/New_York',
	    'HI' => 'Pacific/Honolulu',
	    'IL' => 'America/Chicago',
	    'IA' => 'America/Chicago',
	    'LA' => 'America/Chicago',
	    'ME' => 'America/New_York',
	    'MD' => 'America/New_York',
	    'MA' => 'America/New_York',
	    'MN' => 'America/Chicago',
	    'MS' => 'America/Chicago',
	    'MO' => 'America/Chicago',
	    'MT' => 'America/Denver',
	    'NH' => 'America/New_York',
	    'NJ' => 'America/New_York',
	    'NM' => 'America/Denver',
	    'NY' => 'America/New_York',
	    'NC' => 'America/New_York',
	    'OH' => 'America/New_York',
	    'OK' => 'America/Chicago',
	    'PA' => 'America/New_York',
	    'RI' => 'America/New_York',
	    'SC' => 'America/New_York',
	    'UT' => 'America/Denver',
	    'VT' => 'America/New_York',
	    'VA' => 'America/New_York',
	    'WA' => 'America/Los_Angeles',
	    'WV' => 'America/New_York',
	    'WI' => 'America/Chicago',
	    'WY' => 'America/Denver',
	    'AB' => 'America/Edmonton',
	    'MB' => 'America/Winnipeg',
	    'NB' => 'America/Halifax',
	    'NT' => 'America/Yellowknife',
	    'NS' => 'America/Halifax',
	    'PE' => 'America/Halifax',
	    'YT' => 'America/Whitehorse'
	];

	/**
	 * Some states only have one timezone. Return timezone if this is the case.
	 * 
	 * @param string $state
	 * @return string|null
	 */
	public static function TimezoneFromStateCode(string $state) : ?string {
		$ustate = strtoupper($state);
		if (isset(static::$STATE_TIMEZONE_LIST[$ustate])) {
			// state found in list, return timezone
			return static::$STATE_TIMEZONE_LIST[$ustate];
		}
		return null;
	}
	
	public static function CountryNameToCode(string $name) {
		$uname = strtoupper($name);
		if (isset(static::$COUNTRY_CODE_LIST[$uname])) {
			// name found in list, return code
			return static::$COUNTRY_CODE_LIST[$uname];
		}
		if (in_array($uname, static::$COUNTRY_CODE_LIST)) {
			// name is actually a code, just return it
			return $uname;
		}
		throw new \RuntimeException("failed to parse country name '{$name}' into code");
	}
	
	/**
	 * Attempt to find a ticketmaster looking ID in the url.
	 * 
	 * Do we need to check for hostname?
	 * 
	 * @param string $url
	 * @return string|null
	 */
	public static function ParseTicketmasterIdFromUrl(string $url) : ?string {
		$idFromUrl = null;
		$urlParts = parse_url($url);
		$matches = [];
		// path should end in eg. 'artist/2D0056F7C3BC5C0D'
		if (!empty($urlParts['path']) && preg_match('#(artist|event|venue)/([a-f0-9]+)$#i', $urlParts['path'], $matches)) {
			// get id segment. artist/event/venue would be $matches[1]
			$idFromUrl = $matches[2];
		}
		return $idFromUrl;
	}
	
	/**
	 * Note: I've made a lot of extra work for myself by using strtotime
	 * and other functions that depend on server time. Especially when
	 * server timezone changes after a move, or from dev environment to production.
	 * I'm now trying really really really hard to be explicit with timezones.
	 */
	
	/**
	 * Gets the current datetime in UTC.
	 * 
	 * @param string $format
	 * @return string 
	 */
	public static function NowUTC(string $format = 'Y-m-d H:i:s') : string {
		return static::UTCDatetimeToUTCDatetime('now', $format);
	}
	
	/**
	 * Given eg. "2020-01-01T12:30:00Z", return in a different format, 
	 * by default "2020-01-01 12:30:00".
	 * 
	 * @param string $datetime
	 * @param string $format
	 * @return string
	 */
	public static function UTCDatetimeToUTCDatetime(string $datetime, string $format = 'Y-m-d H:i:s') : string {
		$dt = new DateTime($datetime, new DateTimeZone('UTC'));
		return $dt->format($format);
	}

	/**
	 * Given eg. "2020-01-01 12:30:00" return a timestamp in UTC.
	 * 
	 * @param string $datetime
	 * @return int
	 */
	public static function UTCDatetimeToUTCTimestamp(string $datetime) : int {
		$dt = new DateTime($datetime, new DateTimeZone('UTC'));
		return $dt->getTimestamp();
	}
	
	/**
	 * Given eg. "2020-01-01 12:30:00" return a datetime string in the specified timezone.
	 * 
	 * @param string $datetime
	 * @param string $timezone
	 * @return int
	 */
	public static function UTCDatetimeToLocalDatetime(string $datetime, string $timezone, string $format = 'Y-m-d H:i:s') : string {
		$dt = new DateTime($datetime, new DateTimeZone('UTC'));
		$dt->setTimezone(new DateTimeZone($timezone));
		return $dt->format($format);
	}
	
	/**
	 * Given eg. "2020-01-01 12:30:00" return a timestamp in the specified timezone.
	 * Note that timestamps are by definition UTC. To work around this,
	 * we add the timezone's offset to the utc timestamp.
	 * 
	 * @param string $datetime
	 * @param string $timezone
	 * @return int
	 */
	public static function UTCDatetimeToLocalTimestamp(string $datetime, string $timezone) : int {
		$dt = new DateTime($datetime, new DateTimeZone('UTC'));
		$tz = new DateTimeZone($timezone);
		$offset = $tz->getOffset($dt);
		// by definition timestamp is always in utc...
		// convert to local by adding offset of tz
		return $dt->getTimestamp()+$offset;
	}
	
	/**
	 * Given a UTC timestamp return a timestamp in the specified timezone.
	 * Note that timestamps are by definition UTC. To work around this,
	 * we add the timezone's offset to the utc timestamp.
	 * 
	 * @param int $timestamp
	 * @param string $timezone
	 * @return int
	 */
	public static function UTCTimestampToLocalTimestamp(int $timestamp, string $timezone) : int {
		return \Util::UTCDatetimeToLocalTimestamp('@'.$timestamp, $timezone);
	}

	/**
	 * Given a UTC timestamp return a datetime in the specified timezone.
	 * 
	 * @param int $timestamp
	 * @param string $timezone
	 * @param string $format
	 * @return string
	 */
	public static function UTCTimestampToLocalDatetime(int $timestamp, string $timezone, string $format = 'c') : string {
		return \Util::UTCDatetimeToLocalDatetime('@'.$timestamp, $timezone, $format);
	}
	
	/**
	 * Given a UTC timestamp, return a formatted datetime in UTC.
	 * 
	 * @param int $timestamp
	 * @param string $format
	 * @return string
	 */
	public static function UTCTimestampToUTCDatetime(int $timestamp, string $format = 'c') : string {
		return \Util::UTCDatetimeToUTCDatetime('@'.$timestamp, $format);
	}
	
	/**
	 * Given a local timestamp (ew) return a local datetime.
	 * 
	 * This one is .. weird.
	 * 
	 * @param int $timestamp
	 * @param string $timezone
	 * @param string $format
	 * @return string
	 */
	public static function LocalTimestampToLocalDatetime(int $timestamp, string $timezone, string $format = 'c') : string {
		// setting the tz here to $timezone has no effect, tried it. 
		// it makes sense, timestamps are always utc. need to cheat a little.
		$dt = new DateTime('@'.$timestamp, new DateTimeZone('UTC')); 
		$tz = new DateTimeZone($timezone);
		// set timezone, this will shift us too much
		$dt->setTimezone($tz);
		// now undo that shift
		$offset = $tz->getOffset($dt);
		$dt->modify(($offset*-1).' seconds');
		return $dt->format($format);
	}
	
	public static function LocalDatetimeToUTCDatetime(string $localDatetime, string $localTimezone, string $utcFormat = 'c') : string {
		$dt = new DateTime($localDatetime, new DateTimeZone($localTimezone));
		$dt->setTimezone(new DateTimeZone('UTC'));
		return $dt->format($utcFormat);
	}
	
	public static function NowLocal(string $localTimezone, string $localFormat = 'c') : string {
		$dt = new DateTime('now', new DateTimeZone($localTimezone));
		return $dt->format($localFormat);
	}
	
	public static function LocalDatetimeToUTCTimestamp(string $localDatetime, string $localTimezone) : int {
		$dt = new DateTime($localDatetime, new DateTimeZone($localTimezone));
		$dt->setTimezone(new DateTimeZone('UTC'));
		return $dt->getTimestamp();
	}
	
	/**
	 * Convert state or province name to code.
	 * 
	 * @param string $stateCode
	 * @return string
	 * @throws RuntimeException
	 */
	public static function StateProvinceToCode(string $stateCode) : string {
		// remove '.' from code, eg. "D.C." becomes "DC"
		$upperStateCode = mb_strtoupper(str_replace('.', '', $stateCode));
		// if its already a code, return. codes are uppercase
		if (isset(static::$STATE_CODE_LIST[$upperStateCode])) {
			return $upperStateCode;
		}
		// if its in the list of state names, return code. state names normalized to uppercase, note '.' removed
		if (isset(static::$STATE_LIST[$upperStateCode])) {
			return static::$STATE_LIST[$upperStateCode];
		}
		// idk		
		throw new \RuntimeException("couldnt parse state/prov into code:'{$stateCode}'");
	}
	
	/**
	 * Convert state or province code to country code.
	 * 
	 * @param string $stateCode
	 * @return string
	 * @throws RuntimeException
	 */
	public static function StateProvinceToCountryCode(string $stateCode) : string {
		// remove '.' from code, eg. "D.C." becomes "DC"
		$upperStateCode = mb_strtoupper(str_replace('.', '', $stateCode));
		// if its in the canada list
		if (isset(static::$CANADA_PROV_LIST[$upperStateCode])) {
			return 'CA';
		}
		// if its in the combined state list, and wasnt in canada, it must be in the us.
		if (isset(static::$STATE_CODE_LIST[$upperStateCode])) {
			return 'US';
		}
		// idk		
		throw new \RuntimeException("couldnt parse state/prov into country code:'{$stateCode}'");
	}
	
	/**
	 * Redirect to $url and die. Defaults to a temporary (302) redirect.
	 * 
	 * @param string $url
	 * @param int $responseCode
	 */
	public static function Redirect(string $url, int $responseCode = 302) {
		header('Location: '.$url, true, $responseCode);
		die;
	}
	
	/**
	 * Returns value if it is in the array (and if it is in the allowed array)
	 * 
	 * The allowed array parameter must be non-null to perform the allowed check.
	 * 
	 * @param array $array
	 * @param string $key
	 * @param array|int $allowedValues
	 * @return array
	 */
	public static function ValidateArrayKey(array $array, string $key, $allowedValues = null) {
		if (isset($array[$key])) {
			$v = $array[$key];
			if (null === $allowedValues) {
				// allow check disabled
				return $v;
			}
			if (is_array($allowedValues) && in_array($v, $allowedValues)) {
				// check if value is in array of allowed values
				return $v;
			}
			if (is_int($allowedValues) && (int)$v >= $allowedValues) {
				// if allowed value is an int, it is the minimum value allowed
				return (int)$v;
			}
		}
		return null;
	}
	
	/**
	 * Unsets an array of keys from the given array.
	 * 
	 * Eg. UnsetArray(['a' => 1, 'b' => 2, 'c' => 3], ['a', 'b']) would set $src to ['c' => 3]
	 * 
	 * @param array $src
	 * @param array $keysToUnset
	 */
	public static function UnsetArray(array &$src, array $keysToUnset) {
		foreach ($keysToUnset as $key) {
			unset($src[$key]);
		}
	}
	
	/**
	 * Insert values (assoc array) into an assoc array.
	 * 
	 * Eg. with $a=['a' => 1, 'c' => 3]
	 * ArrayInsert($a, 1, ['b' => 2]) gives ['a' => 1, 'b' => 2, 'c' => 3]
	 * 
	 * Needed because array_splice doesnt work with assoc arrays. 
	 * 
	 * For regular arrays, use array_splice, this wont work as expected.
	 * 
	 * Adapted from https://stackoverflow.com/a/11114956/1058081
	 * 
	 * @param array $arr
	 * @param int $offset
	 * @param array $values
	 * @return array
	 */
	public static function AssocArrayInsert(array $arr, int $offset, array $values) : array {
		return array_slice($arr, 0, $offset, true) + $values + array_slice($arr, $offset, null, true);  
	}
	
	/**
	 * Remove $needle from the front of $haystack.
	 * 
	 * eg. RemoveFromFront('abc def abc', 'abc') would return 'def abc'
	 * 
	 * @param string $haystack
	 * @param string $needle
	 * @return string
	 */
	public static function RemoveFromFront(string $haystack, string $needle) : string {
		// make sure correct delimiter is used in preg_quote
		$pattern = sprintf('/^%s/', preg_quote($needle, '/'));
		$newStr = preg_replace($pattern, '', $haystack);
		return trim($newStr);
	}

	/**
	 * Remove $needle from the end of $haystack.
	 * 
	 * eg. RemoveFromEnd('abc def abc', 'abc') would return 'abc def'
	 * 
	 * @param string $haystack
	 * @param string $needle
	 * @return string
	 */
	public static function RemoveFromEnd(string $haystack, string $needle) : string {
		// make sure correct delimiter is used in preg_quote
		$pattern = sprintf('/%s$/', preg_quote($needle, '/'));
		$newStr = preg_replace($pattern, '', $haystack);
		return trim($newStr);
	}
	
	/**
	 * Given a long string, chop out the middle and replace with something.
	 * 
	 * @param string $string
	 * @param int $lengthOfStartAndEndToKeep
	 * @param int $truncateAtLength
	 * @param string $truncateText
	 * @return string
	 */
	public static function RemoveMiddleOfString(string $string, int $lengthOfStartAndEndToKeep, int $truncateAtLength, string $truncateText = "\n**********TRUNCATED**********\n") : string {
		if (strlen($string) >= $truncateAtLength) {
			$string = substr($string, 0, $lengthOfStartAndEndToKeep).$truncateText.substr($string, -$lengthOfStartAndEndToKeep);
		}
		return $string;
	}
	
	public static function HumanFilesize(int $bytes, $decimals = 2) {
		$factor = floor((strlen((string)$bytes) - 1) / 3);
		$sz = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).$sz[$factor];
	}
	
	/**
	 * Returns an "s" when appropriate (when $count is not 1).
	 * 
	 * "s" and other character can be customized.
	 * 
	 * @param int $count
	 * @param string $whenCountIsNotOne
	 * @param string $whenCountIsOne
	 * @return string
	 */
	public static function S(int $count, string $whenCountIsNotOne = 's', string $whenCountIsOne = '') : string {
		return 1 === $count ? $whenCountIsOne : $whenCountIsNotOne;
	}
	
	/**
	 * Maybe add a host (http://google.com) to a url (/contact-us) if the 
	 * url doesn't already have a host & scheme set.
	 * 
	 * @param string $url
	 * @param string $host
	 * @return string
	 */
	public static function MaybeAddHostToUrl(string $url, string $host) : string {
		// could also do this with parse_url
		$urlParts = parse_url($url);
		if (!empty($urlParts['scheme']) && !empty($urlParts['host'])) {
			return $url;
		}
		// strip / if exists from host and url,
		// then add it back.
		return rtrim($host, '/').'/'.ltrim($url, '/');
	}
	
	/**
	 * Given a file, look up and add its modified time to filename. 
	 * Meant to be used in templates, to break cache.
	 * 
	 * @param string $url
	 * @return type
	 * @throws \RuntimeException
	 */
	public static function AutoVersion(string $url) : string {
		// eg. $url = '/js/bootstrap.js' becomes '/js/bootstrap.{mtime}.js'
		// this needs a matching .htaccess rule to strip off '.{mtime}'
		$filepath = $_SERVER['DOCUMENT_ROOT'].$url;
		if (!file_exists($filepath)) {
			throw new \RuntimeException('file to version doesnt exist: "'.$filepath.'"');
		}
		$mtime = filemtime($filepath);
		$extension = pathinfo($filepath, PATHINFO_EXTENSION);
		return str_replace(".{$extension}", ".{$mtime}.{$extension}", $url);
	}
	
	/**
	 * Get the # of days from now until the specified $timestamp
	 * 
	 * @param int $timestamp
	 * @return int
	 */
	public static function GetDaysToTimestamp(int $timestamp) : int {
		$dt = new DateTime();
		$interval = $dt->diff(new DateTime('@'.$timestamp));
		return (int)($interval->format('%a'));
	}
	
	/**
	 * Turn a string into a URL-friendly slug. Mostly taken
	 * from Wordpress
	 * 
	 * @param string $string
	 * @return string
	 */
	public static function Slugify(string $string) {
		$string = strip_tags($string);
		// Preserve escaped octets.
		$string = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $string);
		// Remove percent signs that are not part of an octet.
		$string = str_replace('%', '', $string);
		// Restore octets.
		$string = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $string);
		$string = mb_strtolower($string);
		$string = preg_replace('/&.+?;/', '', $string); // kill entities
		$string = str_replace('.', '-', $string);
		$string = preg_replace('/[^%a-z0-9 _-]/', '', $string);
		$string = preg_replace('/\s+/', '-', $string);
		$string = preg_replace('|-+|', '-', $string);
		$string = trim($string, '-');
		return $string;
	}
	
	/**
	 * Pluralize with oxford commas, and 'and'.
	 * eg.:
	 * - 1
	 * - 1 and 2
	 * - 1, 2, and 3
	 * - 1, 2, 3, and 4
	 * - ...
	 * 
	 * @param string|null $string, null if $parts is empty
	 */
	public static function Pluralize(array $parts, string $commaChar = ', ', string $andChar = ' and ') : ?string {
		$count = count($parts);
		$ret = null;
		if (1 === $count) {
			// eg. 1
			$ret = $parts[0];
		}
		elseif (2 === $count) {
			// eg 1 and 2
			$ret = implode($andChar, $parts);
		}
		elseif ($count > 2) {
			// prefix 'and', eg 1, 2, and 3 to last part
			$parts[$count-1] = $andChar.$parts[$count-1];
			$ret = implode($commaChar, $parts);
		}
		if ($ret) {
			// in case $parts[0] was eg. an int
			return (string)$ret;
		}
		return $ret;
	}

	/**
	 * Given an array "[a, b, c, d, e, f, g]" we want to partition it into 
	 * 3 arrays. This gives "[a, b, c], [d, e], [f, g]"
	 * 
	 * @param array $list
	 * @param int $p
	 * @return array
	 * @link http://www.php.net/manual/en/function.array-chunk.php#75022
	 */
	public static function PartitionArray(array $list, int $p): array {
		$listlen = count($list);
		$partlen = floor($listlen / $p);
		$partrem = $listlen % $p;
		$partition = [];
		$mark = 0;
		for ($px = 0; $px < $p; $px++) {
			$incr = ($px < $partrem) ? $partlen + 1 : $partlen;
			$partition[$px] = array_slice($list, (int)$mark, $incr);
			$mark += $incr;
		}
		return $partition;
	}
	
	public static function EnablePropelDebugPrinting() {
		// note also need to set ProfilerConnectionWrapper in propel.php to use this
		$logger = new \Monolog\Logger('defaultLogger');
		$handler = new \Monolog\Handler\StreamHandler('php://output');
		$handler->setFormatter(new Monolog\Formatter\HtmlFormatter()); // readable html formatting
		$logger->pushHandler($handler); // stdout for console, output for apache
		//$logger->pushHandler(new StreamHandler('c:\wamp\logs\propel.log')); // or to a file
		\Propel\Runtime\Propel::getServiceContainer()->setLogger('defaultLogger', $logger);
		\Propel\Runtime\Propel::getConnection()->useDebug(true); // note needs profiler enabled in propel.php
	}
	
	/**
	 * Given a URL, insert or update $key with $value into its query string.
	 * 
	 * Returns the updated URL.
	 * 
	 * @param string $fullUrl
	 * @param string $key
	 * @param mixed $value
	 * @return string
	 */
	public static function UpsertQueryString(string $fullUrl, string $key, $value) : string {
		$qsParts = [];
		$qs = parse_url($fullUrl, PHP_URL_QUERY);
		// get everything to left of ? (remove query string from url)
		$bareUrl = strtok($fullUrl, '?');
		if ($qs) {
			parse_str($qs, $qsParts);
		}
		$qsParts[$key] = $value;
		$newQs = http_build_query($qsParts);
		return $bareUrl.'?'.$newQs;
	}
	
	/**
	 * Convert a date to how long ago it was. eg. "3 days, 4 hours ago" with $parts=2.
	 * 
	 * Second param sets how many "parts" are returnd. By default only 1 part 
	 * is returned, eg. "3 days". setting $parts=2 (the default) would return 
	 * the example above. setting $parts=0 will return the full string. 
	 * $parts should be < 8.
	 * 
	 * Mostly fro:
	 * https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
	 * 
	 * @param \DateTime $ago
	 * @param int $parts An integer 0-7
	 * @return string
	 */
	public static function TimeElapsedString(\DateTime $ago, int $parts = 2) : string {
		$now = new DateTime('now', new DateTimeZone('UTC'));
		$diff = $now->diff($ago);
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
		$string = [
		    'y' => 'year',
		    'm' => 'month',
		    'w' => 'week',
		    'd' => 'day',
		    'h' => 'hour',
		    'i' => 'minute',
		    's' => 'second',
		];
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k.' '.$v.($diff->$k > 1 ? 's' : '');
			}
			else {
				unset($string[$k]);
			}
		}
		if ($parts && $parts <= count($string)) {
			$string = array_slice($string, 0, $parts);
		}
		return $string ? implode(', ', $string).' ago' : 'just now';
	}
	
	/**
	 * Remove the hostname portion of a url. Non-http(s) urls will be ignored.
	 * 
	 * @param string $url
	 * @return string
	 */
	public static function RemoveUrlHostname(string $url) : string {
		$parts = parse_url($url);
		$scheme = $parts['scheme'] ?? '';
		if (!in_array($scheme, ['http', 'https'])) {
			// only do this to http(s) urls. dont touch things like android-app://com.google.....
			return $url;
		}
		$clean = $parts['path'] ?? '';
		$query = $parts['query'] ?? '';
		$fragment = $parts['fragment'] ?? '';
		if ($query) {
			$clean .= '?'.$query;
		}
		if ($fragment) {
			$clean .= '#'.$fragment;
		}
		return $clean;
	}
	
	public static function RemovePresaleWords(string $text) : string {
		$text = str_replace(" code","", $text);
		$text = str_replace(" password","", $text);
		$text = str_replace(" presale","", $text);
		$text = str_replace(" pre-sale","", $text);
		$text = str_replace(" official","", $text);
		$text = str_replace(" -","", $text);
		$text = str_replace(" –","", $text);
		return $text;
	}
}

/*

// not sure if this is where these two belong - event could use them too
public function getUTCTimestamp(string $datetime) : int {
	$dt = new DateTime($datetime, new DateTimeZone('UTC'));
	return (int)$dt->getTimestamp();
}

public function getLocalTimestamp(string $datetime, string $timezone) : int {
	$dt = new DateTime($datetime, new DateTimeZone('UTC'));
	$dt = $dt->setTimezone(new DateTimeZone($timezone));
	// format('U') and getTimestamp always return in utc... do it this way instead
	return (int)strtotime($dt->format('Y-m-d H:i:s')); 
}
*/