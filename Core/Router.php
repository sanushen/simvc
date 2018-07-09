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
        //Match via controller/action
        $pattern = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        if (preg_match($pattern, $url,$matches)){

            $params = [];

            foreach ($matches as $key => $value){
                if (is_string($key)){
                    $params[$key] = $value;
                }
            }

            $this->params = $params;
            return true;
            
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