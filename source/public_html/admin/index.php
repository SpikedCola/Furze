<?php declare(strict_types=1);

require_once(__DIR__.'/ui.php');

// get next ep to work on
$episodesToProcess = EpisodeQuery::create()
	->filterByProcessed(0) 
	->find();

$template->assign('episodesToProcess', $episodesToProcess);

$template->display('admin/index.tpl');