<?php

require '../Core/Router.php';
require '../App/Controllers/GalleryController.php';

$router = new Router();

$router->add('', ['controller' => 'Homepage', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);

