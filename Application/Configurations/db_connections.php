<?php
    use Attw\DB\Connection\MySQLConnectorConfig;
    use Attw\DB\Connection\PDOConnector;
    use Attw\DB\Collection as DBCollection;
    
    /**
     * Default example
     * To use the database components, define a defualt connection:
     *
     * $default_mysql_connection_config = new MySQLConnectorConfig( 'localhost', 'dbname', 'root', 'password' );
     * $pdo_connector = new PDOConnector( $default_mysql_connection_config );
     *
     * $dbcollection = DBCollection::getInstance();
     *
     * $dbcollection->add( 'Default', $pdo_connector );
    */

    /**
     * Add other connection:
     *
     * $default_mysql_connection_config = new MySQLConnectorConfig( 'host', 'dbname', 'root', 'password' );
     * $pdo_connector = new PDOConnector( $default_mysql_connection_config );
     *
     * $dbcollection = DBCollection::getInstance();
     *
     * $dbcollection->add( 'ConnectionName', $pdo_connector );
    */