<?php declare(strict_types=1);

trait getProcessedDatetimeLocal {
	public function getProcessedDatetimeLocal(string $timezone, string $format = 'c') : string {
		if (!$this->getProcessedDatetime()) {
			return '';
		}
		return \Util::UTCDatetimeToLocalDatetime($this->getProcessedDatetime('c'), $timezone, $format);
	}
}
