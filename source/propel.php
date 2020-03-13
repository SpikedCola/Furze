<?php declare(strict_types=1);

/**
 * 
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> 2019-11-09
 */

require_once(__DIR__.'/credentials.php');

$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn' => 'mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,
  'user' => DB_USERNAME,
  'password' => DB_PASSWORD,
  'settings' =>
  array (
    'charset' => 'utf8mb4',
    'queries' =>
    array (
    ),
  ),
  'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');