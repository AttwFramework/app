<?php
/**
 * Run the application
*/

use Attw\Application\Application;
use Attw\Application\ControllerDispatcher;
use Attw\HTTP\Request;
use Attw\HTTP\Response;
use Attw\Router\RoutingHandler;
use Attw\Tool\UrlParser;

require_once 'Configurations' . DIRECTORY_SEPARATOR . 'routes.php';

$routingHandler = new RoutingHandler($routesCollection);
$urlParser = new UrlParser();
$request = new Request();
$url = $request->server('REQUEST_URI');
$queries = $urlParser->getQueries($url);
$request->addQuery($queries);

$application = new Application(new ControllerDispatcher(), $routingHandler);
$application->run(new Response(), $request, 'MVC\Controller', 'MVC\Model', 'Index', 'index');

/**
 * ^ DEFAULT INIT ($application)
 *
 * Controllers namespace: MVC\Controller
 * Models namespace: MVC\Model
 * Default controller: Index
 * Default action: index
*/