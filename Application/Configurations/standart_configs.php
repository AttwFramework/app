<?php
	use Attw\Config\Configs;
	use Attw\HTTP\Response;

	/**
	 * Errors
	*/
	if( Configs::exists( 'ErrorsReporting' ) ){
		error_reporting( Configs::get( 'ErrorsReporting' ) );
	}else{
		error_reporting( E_ALL | E_STRICT );
	}

	/**
	 * Error logs
	*/
	if( Configs::exists( 'Logs' ) ){
		$logsConfig = Configs::get( 'Logs' );

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
	if( Configs::exists( 'Timezone' ) ){
		date_default_timezone_set( Configs::get( 'Timezone' ) );
	}

	/**
	 * Page encoding
	*/
	if( Configs::exists( 'Content-Type' ) ){
		$response = new Response;
		if( Configs::exists( 'Charset' ) ){
			$response->sendHeader( 'Content-Type', Configs::get( 'Content-Type' ) . '; Charset=' . Configs::get( 'Charset' ) );
		}else{
			$response->sendHeader( 'Content-Type', Configs::get( 'Content-Type' ) );
		}
	}