<?php

namespace App\Core;


class Request
{
    private $routeParams;
    private $uri;
    private $method;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function addRouteParams($key, $value)
    {
        $this->routeParams[$key] = $value;
    }

    public function getRouteParams($key)
    {
        return $this->routeParams[$key];
    }


    public function uri()
    {
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
        $this->uri = str_replace("/microframework/", "", $this->uri);
        return $this->uri;
    }

    public function method()
    {
        return $this->method;
    }
}
