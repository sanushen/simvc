<?php

/**
 * Autoloader
 */
require '../vendor/autoload.php';

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

/**
 * Error handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new \Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'indexAction']);
$router->add('/gallery', ['controller' => 'Gallery', 'action' => 'indexAction']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

try{
    $router->dispatch($_SERVER['QUERY_STRING']);
} catch(Exception $e) {
    echo 'Something is broken. Read this - ' . $e->getMessage();
}