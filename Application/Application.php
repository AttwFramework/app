<?php
/**
 * Run the application
*/

use Attw\Application\Application;
use Attw\Application\ControllerDispatcher;
use Attw\HTTP\Request;
use Attw\HTTP\Response;
use Attw\Router\RoutingHandler;
use Attw\Router\RouterUrlGenerator;
use Attw\Tool\UrlParser;
use Attw\View\StandartView;
use Attw\Config\Configs;
use Attw\Application\Exception\ApplicationException;

require_once 'Configurations' . DIRECTORY_SEPARATOR . 'routes.php';

$configs = Configs::getInstance();

if (!$configs->exists('Paths')) {
    templateNotConfigured();
}

$paths = $configs->get('Paths');

if (!isset($paths['Templates'])) {
    templateNotConfigured();
}

$view = new StandartView();
$view->setTemplatesPath($paths['Templates']);

$routingHandler = new RoutingHandler($routesCollection);
$urlGenerator = new RouterUrlGenerator($routesCollection);
$urlParser = new UrlParser();
$request = new Request();
$url = $request->server('REQUEST_URI');
$queries = $urlParser->getQueries($url);
$request->addQuery($queries);

$application = new Application(new ControllerDispatcher(), $routingHandler);
$application->run(new Response(), $request, $urlGenerator, $view, 'MVC\Controller', 'MVC\Model', 'Index', 'index');

/**
 * ^ DEFAULT INIT ($application)
 *
 * Controllers namespace: MVC\Controller
 * Models namespace: MVC\Model
 * Default controller: Index
 * Default action: index
*/

function templateNotConfigured()
{
    throw new ApplicationException('Configure the default template path');
}