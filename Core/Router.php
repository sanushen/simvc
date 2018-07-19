<?php

namespace Core;

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
     * @param array $params
     *
     * @return void
     */
    public function add($route, $params = [])
    {
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
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
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

    /**
     * @param string $url The route URL
     *
     * @return void
     *
     * @throws \Exception
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);
        if ($this->matchRoute($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;
            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    throw new \Exception("Method $action (in controller $controller) not found");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception('No route matched.');
        }
    }

    /**
     * @param string $string
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * @param string $string
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * @return string The request URL
     */
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }

    /**
     *
     * @param string $url The full URL
     *
     * @return string The URL with the query string variables removed
     */
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }
}