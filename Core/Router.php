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
        //copied this stuff - convert route to regex, convert variables, start and end delimiters _ case insinsitive flag
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        $route = '/^' . $route . '$/i';

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

    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $url The route URL
     *
     * @return void
     */
    public function dispatch($url)
    {
        if ($this->matchRoute($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);

            if (class_exists($controller)) {
                $controller_object = new $controller();

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();

                } else {
                    echo "Method $action (in controller $controller) not found";
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    /**
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

}