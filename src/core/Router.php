<?php

namespace App\Core;

use App\Controllers\ErrorController;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'DELETE' => [],
        'PUT' => []
    ];

    public function add($method, $uri, $action)
    {
        $this->routes[strtoupper($method)][$this->generateRegex($uri)] = $action;
    }

    public function get($uri, $action)
    {
        $this->add('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->add('POST', $uri, $action);
    }

    public function delete($uri, $action)
    {
        $this->add('DELETE', $uri, $action);
    }

    public function put($uri, $action)
    {
        $this->add('PUT', $uri, $action);
    }

    public function resolve()
    {
        $uri = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route => $action) {
            if (preg_match($route, $uri, $matches)) {
                array_shift($matches);
                return $this->handleAction($action, $matches);
            }
        }

        return $this->handleAction('ErrorController@notFound');
    }

    private function parseUrl()
    {
        return isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : "/";
    }

    private function handleAction($action, $params = [])
    {
        list($controller, $method) = explode('@', $action);
        $controller = ucfirst($controller);
        $controllerClass = "App\\Controllers\\$controller";
        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass;

            if (method_exists($controllerInstance, $method)) {
                return call_user_func_array([$controllerInstance, $method], $params);
            }
        }

        return (new ErrorController)->notFound();
    }

    private function generateRegex($uri)
    {
        $pattern = preg_replace('/{([^}]+)}/', '([^/]+)', $uri);
        return "#^$pattern$#";
    }
}
