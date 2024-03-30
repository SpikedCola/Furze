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
	use \setCreatedDatetime, \getCreatedDatetimeLocal, \getProcessedDatetimeLocal;
	
	/**
	 * Set processed_datetime on setting processed = 1.
	 * 
	 * @param mixed $v
	 * @return self
	 */
	public function setProcessed($v) : self {
		if ($v && ($this->getProcessed() !== $v)) {
			$this->setProcessedDatetime(Util::NowUTC());
		}
		return parent::setProcessed($v);
	}
}