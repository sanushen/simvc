<?php

/**
 * Composer
 */
require '../vendor/autoload.php';

/**
 * Error handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new \Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'indexAction']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

try{
    $router->dispatch($_SERVER['QUERY_STRING']);
} catch(Exception $e) {
    echo 'Something is broken. Check - ' . $e->getMessage();
}