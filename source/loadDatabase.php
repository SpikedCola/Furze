<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'episodes' => '\\Map\\EpisodeTableMap',
      'song_links' => '\\Map\\SongLinkTableMap',
      'songs' => '\\Map\\SongTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Episode' => '\\Map\\EpisodeTableMap',
      '\\Song' => '\\Map\\SongTableMap',
      '\\SongLink' => '\\Map\\SongLinkTableMap',
    ),
  ),
));
