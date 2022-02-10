<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Map\\EpisodeTableMap',
    1 => '\\Map\\SongLinkTableMap',
    2 => '\\Map\\SongTableMap',
  ),
));
