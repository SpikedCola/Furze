<?php

// to install, symlink to composer's vendor/bin/ dir:
//   ln -s /var/www/colinfurzemusic/database/propel.php /var/www/colinfurzemusic/source/vendor/bin/propel.php
// or, on windows:
//   mklink "c:/wamp/www/furze/source/vendor/bin/propel.php" "c:/wamp/www/furze/database/propel.php"
//   mklink "c:/www/furze/source/vendor/bin/propel.php" "c:/www/furze/database/propel.php"
// this will tell propel to use db/user/pass defined in credentials.php
// then run:
//   propel config:convert --output-file=propel.php
// to build the config file for the app. this needs to be run after any changes to this file.

require_once(__DIR__.'/../source/credentials.php');

return [
    'propel' => [
	'general' => [
	    'project' => 'furze'
	],
	'paths' => [
	    // new version of propel conf requires a separate file for table maps. 
	    // this will change on every build of propel. need to tell propel
	    // to store this file in /source/, next to propel.php
	    'loaderScriptDir' => __DIR__.'/../source/',
	    // The directory where Propel expects to find your `schema.xml` file.
	    'schemaDir' => __DIR__,
	    // The directory where Propel should output generated object model classes.
	    'phpDir' => __DIR__.'/../source/classes/Propel',
	    'migrationDir' => __DIR__.'/migrations/',
	    'phpConfDir' => __DIR__.'/../source/'
	],
	'generator' => [
	    'dateTime' => [
		'useDateTimeClass' => true
	    ]
	],
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,
                    'user' => DB_USERNAME,
                    'password' => DB_PASSWORD,
                    'settings' => [
                        'charset' => 'utf8mb4'
                    ]
                ]
            ]
        ]
    ]
];