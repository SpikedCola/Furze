<?php

use Propel\Runtime\Connection\ConnectionInterface;

trait setCreatedDatetime {
	public function preInsert(ConnectionInterface $con = null) : bool {
		if (!$this->getCreatedDatetime()) {
			$this->setCreatedDatetime(\Util::NowUTC());
		}
		return true;
	}
}