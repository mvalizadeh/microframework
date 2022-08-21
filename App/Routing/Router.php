<?php

namespace App\Routing;

use App\Core\Request;
use Exception;

class Router
{
    use \App\Traits\View;

    private $request;
    private $routes;
    private $currentRoute;
    private $params;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->currentRoute = $this->findRoute($this->request);
    }

    public function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if (!in_array($request->method(), $route['methods'])) {
                return false;
            }
            if ($this->regexMatched($route)) {
                return $route;
            }
        }
        return null;
    }

    public function regexMatched($route)
    {
        global $request;
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . "$/";
        $result = preg_match($pattern, $this->request->uri(), $matches);
        if (!$result) {
            return false;
        }
        foreach ($matches as $key => $value) {
            if (!is_int($key)) {
                $request->addRouteParams($key, $value);
            }
        }
        return true;
    }

    public function run()
    {
        if (is_null($this->currentRoute)) {
            return $this->dispatch404();
        }
        $this->dispatch($this->currentRoute);
    }

    private function dispatch($route) //get route
    {
        $action = $route['action'];

        if (is_null($action) || empty($action)) {
            return;
        }

        if (is_callable($action)) {
            // $action();
            call_user_func($action);
        }

        if (is_string($action)) {
            $action = explode('@', $action);
        }

        if (is_array($action)) {
            $className = 'App\Controllers\\' . $action[0];
            $method = $action[1];
            if (!class_exists($className)) {
                throw new Exception("Class $className Not Exist");
            }
            $controller = new $className;
            if (!method_exists($className, $method)) {
                throw new Exception("Method $method Not Exist");
            }
            $controller->{$method}();
        }
    }

    public function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->view('errors.404');
        die;
    }
}
