<?php declare(strict_types=1);

// put in classes/vendor/bin/ once propel is installed. 
// this will tell propel to use db/user/pass defined in credentials.php

require_once(__DIR__.'/../../../credentials.php');

return [
    'propel' => [
        'paths' => [
			// new version of propel conf requires a separate file for table maps. 
			// this will change on every build of propel. need to tell propel
			// to store this file in /source/, next to propel.php
			'loaderScriptDir' => '../../../',
            // The directory where Propel expects to find your `schema.xml` file.
            'schemaDir' => '../../../../database/',
            // The directory where Propel should output generated object model classes.
            'phpDir' => '../../Propel',
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