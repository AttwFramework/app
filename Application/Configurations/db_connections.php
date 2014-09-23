<?php
use Attw\Db\Connection\PDOConnector;
use Attw\Db\Collection as DBCollection;
use Attw\Db\Sql\MySQL;

/*
 * Default example
 * To use the database components, define a defualt connection:
 *
 * $pdo_connector = new PDOConnector( 'mysql:host=localhost;dbname=test', 'user', 'pass' );
 *
 * $dbcollection = DBCollection::getInstance();
 *
 * $dbcollection->add( 'Default', $pdo_connector );
 */

//$pdo_connector = new PDOConnector('mysql:host=localhost;dbname=test', 'user', 'pass');
//$dbcollection = DBCollection::getInstance();
//$dbcollection->add('Default', $pdo_connector);

$sqlGenerators = array(
    'mysql' => new MySQL()
);

/*
 * Add other connection:
 *
 * $pdo_connector = new PDOConnector( 'mysql:host=localhost;dbname=test', 'user', 'pass' );
 *
 * $dbcollection = DBCollection::getInstance();
 *
 * $dbcollection->add( 'ConnectionName', $pdo_connector );
*/