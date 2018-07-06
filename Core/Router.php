<?php

class Router
{

    /**
     * Routing table
     * @var array
     */
    protected $routes = [];

    /**
     * @var array - Parameters for each route
     */
    protected $params = [];

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
     * @return array - Return an array of routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param string $url - Route URL
     * @return bool
     */
    public function matchRoute($url)
    {
        foreach($this->routes as $route => $params)
        {
            if ($url == $route)
            {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}