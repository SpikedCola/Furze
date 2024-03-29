<?php declare(strict_types=1);

require_once(__DIR__.'/../inc.php');

header('Content-Type: text/html; charset=utf-8');

// tell template to never cache templates
// probably want this to = false in production
$disableTemplateCaching = true;

// base template object
$template = new Template(__DIR__.'/../templates/', __DIR__.'/../../cache/templates_compiled/', __DIR__.'/../../cache/templates_cache/', $disableTemplateCaching);

// auto escape all stuff (dont need {{}} any more!)
$template->escape_html = true;

// generic wrapper for all pages, handles adding js/css/title/other globals
$template->wrapper = 'wrapper.tpl';

$template->css('index.css');
$template->css('sortable-theme-light.css');

$template->js('ga.js');
$template->js('sortable.min.js');