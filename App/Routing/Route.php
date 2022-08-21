<?php

namespace App\Routing;


class Route
{
    private static $routes = [];

    public static function add($methods, $uri, $action = null)
    {
        $methods = is_array($methods) ? $methods : [$methods];
        return self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => $action];
    }

    public static function get($uri, $action = null)
    {
        return self::add('get', $uri, $action);
    }

    public static function post($uri, $action = null)
    {
        return self::add('post', $uri, $action);
    }

    public static function put($uri, $action = null)
    {
        return self::add('put', $uri, $action);
    }

    public static function delete($uri, $action = null)
    {
        return self::add('delete', $uri, $action);
    }

    public static function routes()
    {
        return self::$routes;
    }
}
