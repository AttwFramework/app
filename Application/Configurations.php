<?php
	use Attw\Config\Configs;

	$configs = Configs::getInstance();

	/**
	 * Configurations of logs
	*/
	$logs = array(
		'SystemErrorLogs' => array( 
			'Activated' => true,
			'File' => APP_ROOT . DS . 'Application' . DS . 'err-logs.txt' 
		),

		'SystemLogs' => array( 
			'File' => APP_ROOT . DS . 'Application' . DS . 'logs.txt'
		),

		'LogTypesLocals' => array( 
			LOG_WARNING => APP_ROOT . DS . 'Application' . DS . 'logs' . DS . 'logs-warning.txt'
			//...
		)
	);

	$configs->set( 'Logs', $logs );

	/**
	 * SQL Generators Collection
	*/
	$sqls = array( 'mysql' => new Attw\DB\SQL\MySQL );

	$configs->set( 'SQLGenerators', $sqls );

	/**
	 * Paths configuration
	*/
	$paths = array( 
		'Templates' => APP_ROOT . DS . 'Application' . DS . 'MVC' . DS . 'View' . DS . 'Templates',
		'Temporary' => APP_ROOT . DS . 'tmp'
	);
	
	$configs->set( 'Paths', $paths );

	/**
	 * TimeZone
	*/
	$configs->set( 'Timezone', 'America/Sao_Paulo' );

	/**
	 * Errors
	*/
	$configs->set( 'ErrorsReporting', E_ALL | E_STRICT  );
	$configs->set( 'PageErrors', array( '404' => 'http://localhost' ) );

	/**
	 * Content types
	*/
	$configs->set( 'Content-Type', 'text/html' );
	$configs->set( 'Charset', 'UTF-8' );

	require_once 'Configurations' . DIRECTORY_SEPARATOR . 'db_connections.php';
	require_once 'Event' . DIRECTORY_SEPARATOR . 'events.php';