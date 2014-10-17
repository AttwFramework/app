<?php
/**
 * Run the application
*/

use Attw\Application\Application;
use Attw\Mvc\Controller\ControllerDispatcher;
use Attw\HTTP\Request;
use Attw\HTTP\Response;
use Attw\Router\RoutingHandler;
use Attw\Router\RouterUrlGenerator;
use Attw\Tool\UrlParser;
use Attw\Mvc\View\StandardView;
use Attw\Config\Configs;
use Attw\Application\Exception\ApplicationException;
use Attw\Mvc\Model\ModelDispatcher;
use Attw\Db\Collection as DBCollection;
use Attw\Db\Storage\Storage;
use Attw\Db\Entity\EntityStorage;

require_once 'Configurations' . DIRECTORY_SEPARATOR . 'routes.php';
require_once 'Event' . DIRECTORY_SEPARATOR . 'events.php';
require_once 'Configurations' . DIRECTORY_SEPARATOR . 'db_connections.php';

$configs = Configs::getInstance();

if (!$configs->exists('Paths')) {
    templateNotConfigured();
}

$paths = $configs->get('Paths');

if (!isset($paths['Templates'])) {
    templateNotConfigured();
}

$view = new StandardView();
$view->setTemplatesPath($paths['Templates']);

$routingHandler = new RoutingHandler($routesCollection);
$urlGenerator = new RouterUrlGenerator($routesCollection);
$urlParser = new UrlParser();
$request = new Request();
$url = full_url($request->server->getAll());
$queries = $urlParser->getQueries($url);
foreach ($queries as $key => $value) {
    $request->query->set($key, $value);
}

/* Database configurations */
$dbcollection = DBCollection::getInstance();
if ($dbcollection->exists('Default')) {
    $connection = $dbcollection->get('Default');
    $driver = strtolower($connection->getDriver());
    $sqlGenerator = $sqlGenerators[$driver];
    $storage = new Storage($connection, $sqlGenerator);
    $entityStorage = new EntityStorage($storage);
    $modelDispatcher = new ModelDispatcher($storage, $entityStorage);
} else {
    $modelDispatcher = new ModelDispatcher();
}

$application = new Application(new ControllerDispatcher(), $modelDispatcher, $routingHandler);
$application->run(new Response(), $request, $urlGenerator, $view, $eventManager, 'MVC\Controller', 'Index', 'index', 'MVC\Model');

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

/**
 * @author Timo Huovinen
*/
function url_origin($s, $use_forwarded_host=false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

/**
 * @author Timo Huovinen
*/
function full_url($s, $use_forwarded_host=false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}