<?php
	use Attw\Config\Configs;
	use Attw\HTTP\Response;
	use Attw\Logger\FileLogger;

	$configs = Configs::getInstance();

	/**
	 * Errors
	*/
	if( $configs->exists( 'ErrorsReporting' ) ){
		error_reporting( $configs->get( 'ErrorsReporting' ) );
	}else{
		error_reporting( E_ALL | E_STRICT );
	}

	/**
	 * Error logs
	*/
	if( $configs->exists( 'Logs' ) ){
		$logsConfig = $configs->get( 'Logs' );

		if( isset( $logsConfig['LogTypesLocals'] ) ){
			FileLogger::setLogsLocals( $logsConfig['LogTypesLocals'] );
		}

		if( isset( $logsConfig['SystemErrorLogs'] ) ){
			if( isset( $logsConfig['SystemErrorLogs']['Activated'] ) && $logsConfig['SystemErrorLogs']['Activated'] ){
				if( !isset( $logsConfig['SystemErrorLogs']['File'] ) ){
					throw new RuntimeException( 'To activate the system error logs, indicate the file to save logs' );
				}
				
				ini_set( 'log_errors', true );
				ini_set( 'error_log', $logsConfig['SystemErrorLogs']['File'] );
			}
		}
	}

	/**
	 * Timezone
	*/
	if( $configs->exists( 'Timezone' ) ){
		date_default_timezone_set( $configs->get( 'Timezone' ) );
	}

	/**
	 * Page encoding
	*/
	if( $configs->exists( 'Content-Type' ) ){
		$response = new Response;
		if( $configs->exists( 'Charset' ) ){
			$response->sendHeader( 'Content-Type', $configs->get( 'Content-Type' ) . '; Charset=' . $configs->get( 'Charset' ) );
		}else{
			$response->sendHeader( 'Content-Type', $configs->get( 'Content-Type' ) );
		}
	}