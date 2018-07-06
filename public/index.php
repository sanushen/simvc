<?php

require '../Core/Router.php';

$router = new Router();

$router->add('', ['controller' => 'Homepage', 'action' => 'index']);
$router->add('blog',['controller' => 'Blog', 'action' => 'index']);
$router->add('shop',['controller' => 'Shop', 'action' => 'index']);
$router->add('gallery',['controller' => 'Gallery', 'action' => 'index']);


$url = $_SERVER['QUERY_STRING'];
