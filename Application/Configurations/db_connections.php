<?php
    use Attw\DB\Connection\Connector\PDOConnector;
    use Attw\DB\Collection as DBCollection;

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

    /*
     * Add other connection:
     *
     * $pdo_connector = new PDOConnector( 'mysql:host=localhost;dbname=test', 'user', 'pass' );
     *
     * $dbcollection = DBCollection::getInstance();
     *
     * $dbcollection->add( 'ConnectionName', $pdo_connector );
    */
