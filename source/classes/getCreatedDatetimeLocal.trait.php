<?php declare(strict_types=1);

trait getCreatedDatetimeLocal {
	public function getCreatedDatetimeLocal(string $timezone, string $format = 'c') : string {
		if (!$this->getCreatedDatetime()) {
			return '';
		}
		return \Util::UTCDatetimeToLocalDatetime($this->getCreatedDatetime('c'), $timezone, $format);
	}
}
