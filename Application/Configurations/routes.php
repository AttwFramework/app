<?php
use Attw\Router\Route;
use Attw\Router\RoutesCollection;

/**
 * If you change the name of this variable,
 *  go to Application/Application.php and change there too
*/
$routesCollection = new RoutesCollection();
$routesCollection->add(new Route('index', null, array('controller' => 'Index', 'action' => 'index')));

/**
 * @example
 *  $routesCollection->add( new Route( 'post_read', 'id', array(
 * 	    'controller' => array(
 * 		   'post' => 'Posts'
 * 	    ),
 * 	    'action' => 'read'
 *  ) ) );
*/