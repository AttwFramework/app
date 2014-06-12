<?php
	use Attw\Config\Configs;

	$configs = Configs::getInstance();

	/**
	 * Configurations of logs
	*/
	$logs = array(  'SystemErrorLogs' => array( 
						'Activated' => true,
						'File' => APP_ROOT . DS . 'Application' . DS . 'err-logs.txt' 
					),

				   'SystemLogs' => array( 
				   		'File' => APP_ROOT . DS . 'Application' . DS . 'logs.txt' 
				   	),

				   'LogTypesLocals' => array( 
						LOG_WARNING => APP_ROOT . DS . 'Application' . DS . 'logs' . DS . 'logs-warning.txt' 
					)
	);

	$configs->add( 'Logs', $logs );

	/**
	 * SQL Generators Collection
	*/
	$sqls = array( 'mysql' => new Attw\DB\SQL\MySQL );

	$configs->add( 'SQLGenerators', $sqls );

	/**
	 * Paths configuration
	*/
	$paths = array( 'Templates' => APP_ROOT . DS . 'Application' . DS . 'MVC' . DS . 'View' . DS . 'Templates',
                    'Temporary' => APP_ROOT . DS . 'tmp' );
    
    $configs->add( 'Paths', $paths );

    /**
	 * TimeZone
    */
    $configs->add( 'Timezone', 'America/Sao_Paulo' );

    /**
	 * Errors
    */
    $configs->add( 'ErrorsReporting', E_ALL | E_STRICT  );
	$configs->add( 'PageErrors', array( '404' => 'http://localhost' ) );

    /**
     * Content types
    */
    $configs->add( 'Content-Type', 'text/html' );
    $configs->add( 'Charset', 'UTF-8' );

    require_once 'Configurations' . DIRECTORY_SEPARATOR . 'db_connections.php';
    require_once 'Event' . DIRECTORY_SEPARATOR . 'events.php';