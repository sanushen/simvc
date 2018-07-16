<?php

/**
 * Twig
 */
require_once dirname(__DIR__) . '/vendor/vendor/autoload.php';


/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new Core\Router();

$router->add('', ['controller' => 'HomeController', 'action' => 'indexAction']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);

