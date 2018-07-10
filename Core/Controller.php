<?php

namespace Core;

abstract class Controller
{

    /**
     * @var array
     */
    protected $route_params = [];

    /**
     * @param array $route_params  Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }
}