<?php

class Router
{

    /**
     * Routing table
     * @var array
     */
    protected $routes = [];

    /**
     * @param string $route  URL
     * @param array  $params
     *
     * @return void
     */
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}