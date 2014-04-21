<?php
    use Attw\DB\Connection\MySQLConnectorConfig;
    use Attw\DB\Connection\PDOConnector;
    use Attw\DB\Collection as DBCollection;
    
    //$default_mysql_connection_config = new MySQLConnectorConfig( 'localhost', 'dbname', 'root', 'password' );
    //$pdo_connector = new PDOConnector( $default_mysql_connection_config );
    
    //DBCollection::add( 'Default', $pdo_connector );

    /**
     * Add other connection:
     * $default_mysql_connection_config = new MySQLConnectorConfig( 'host', 'dbname', 'root', 'password' );
     * $pdo_connector = new PDOConnector( $default_mysql_connection_config );
     *
     * DBCollection::add( 'ConnectionName', $pdo_connector );
    */