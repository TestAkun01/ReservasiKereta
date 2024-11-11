<?php

namespace App\Core;

use App\Controllers\ErrorController;

class Router
{
    protected $middlewares = [];
    private $routes = [
        'GET' => [],
        'POST' => [],
        'DELETE' => [],
        'PUT' => []
    ];

    public function addGlobalMiddleware($action)
    {
        $this->middlewares[] = $action;
    }

    public function add($method, $uri, $action, $middleware)
    {
        $this->routes[strtoupper($method)][$this->generateRegex($uri)] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function get($uri, $action, $middleware = null)
    {
        $this->add('GET', $uri, $action, $middleware);
    }

    public function post($uri, $action, $middleware = null)
    {
        $this->add('POST', $uri, $action, $middleware);
    }

    public function delete($uri, $action, $middleware = null)
    {
        $this->add('DELETE', $uri, $action, $middleware);
    }

    public function put($uri, $action, $middleware = null)
    {
        $this->add('PUT', $uri, $action, $middleware);
    }

    public function resolve()
    {
        $uri = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->middlewares as $middleware) {
            $this->runMiddleware($middleware);
        }

        foreach ($this->routes[$method] as $route => $data) {
            if (preg_match($route, $uri, $matches)) {
                array_shift($matches);

                if (isset($data['middleware'])) {
                    $this->runMiddleware($data['middleware']);
                }

                return $this->handleAction($data['action'], $matches);
            }
        }

        return $this->handleAction('ErrorController@notFound');
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

    private function runMiddleware($middleware)
    {
        if (is_string($middleware)) {
            list($class, $method) = explode('@', $middleware);
            $class = "App\\Middlewares\\$class";

            if (class_exists($class) && method_exists($class, $method)) {
                call_user_func([new $class, $method]);
            } else {
                throw new \Exception("Middleware $class@$method tidak ditemukan.");
            }
        } elseif (is_callable($middleware)) {
            call_user_func($middleware);
        }
    }

    private function generateRegex($uri)
    {
        $pattern = preg_replace('/{([^}]+)}/', '([^/]+)', $uri);
        return "#^$pattern$#";
    }

    private function parseUrl()
    {
        return isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : "/";
    }
}
