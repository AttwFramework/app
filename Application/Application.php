<?php
	use Attw\Application\Application;
	use Attw\Router\RoutingHandler;
	use Attw\Application\ControllerDispatcher;
	use Attw\HTTP\Request;

	require_once 'Configurations' . DIRECTORY_SEPARATOR . 'routes.php';

	$routingHandler = new RoutingHandler( $routesCollection );

    $application = new Application( new ControllerDispatcher(), $routingHandler );
    $application->run( new Request(), 'MVC\Controller' );