<?php

/**
 * Twig
 */
require '../vendor/vendor/autoload.php';

/**
 * Autoloader
 */
//spl_autoload_register(function ($class) {
//    $root = dirname(__DIR__);   // get the parent directory
//    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
//    if (is_readable($file)) {
//        require $root . '/' . str_replace('\\', '/', $class) . '.php';
//    }
//});

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'indexAction']);
$router->add('/gallery', ['controller' => 'Gallery', 'action' => 'indexAction']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);



