<?php
(!defined('DS')) ? define('DS', DIRECTORY_SEPARATOR) : null;
(!defined('APP_ROOT')) ? define('APP_ROOT', realpath(__DIR__  . '..' . DS)) : null;
(!defined('APP')) ? define('APP', 'Application') : null;

if (file_exists('vendor' . DS . 'autoload.php')) {
    require_once 'vendor' . DS . 'autoload.php';

    /**
     * If not configured in composer.json
    */
    $autoloader = new Attw\Autoloader\Autoloader();
    $application = new Attw\Autoloader\Autoloadable\DefaultAutoloadable(APP);
    $autoloader->attach($application);
} else {
    //Point where is the framework folder
    (!defined('ATTW_FOLDER')) ? define('ATTW_FOLDER', realpath(APP_ROOT . DS . '..' . DS . 'framework')) : null;

    $autoload = ATTW_FOLDER . DS . 'autoload' . DS . 'autoload_without_composer.php';

    if (!file_exists($autoload)) {
        throw new Exception('Indicate a valid folder to AttwFramework');
    }

    require_once $autoload;
}

require_once 'Application' . DS . 'Configurations.php';
require_once 'Application' . DS . 'Configurations' . DS . 'routes.php';
require_once 'Application' . DS . 'Configurations' . DS . 'standart_configs.php';
require_once 'Application' . DS . 'Application.php';