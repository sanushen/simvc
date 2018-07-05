<?php

require '../Core/Router.php';

$router = new Router();

$router->add('', ['controller' => 'Homepage', 'action' => 'index']);
$router->add('blog',['controller' => 'Blog', 'action' => 'index']);

$url = $_SERVER['QUERY_STRING'];
