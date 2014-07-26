<?php
	use Attw\Application\Application;
	use Attw\Router\RoutingHandler;
	use Attw\Application\ControllerDispatcher;
	use Attw\HTTP\Request;
	use Attw\HTTP\Response;

	require_once 'Configurations' . DIRECTORY_SEPARATOR . 'routes.php';

	$routingHandler = new RoutingHandler( $routesCollection );

	$application = new Application( new ControllerDispatcher(), $routingHandler );
	$application->run( new Response(), new Request(), 'MVC\Controller', 'MVC\Model' );