<?php

namespace App;

use InvalidArgumentException;

class Router
{
    private array $routes = [];
    private string $action = '';

    public function __construct(string $action, array $routes)
    {
        $this->action = $action;
        $this->routes = $routes;
    }

    public function route()
    {
        foreach ($this->routes as $route) {
            if ($this->action == $route->action() and $this->requestIs($route->verb())) {
                if ($route->hasMiddlewares()) {
                    $this->callMiddlewares($route->middlewares());
                }
                $this->callController($route->controller(), $route->method());
            }
        }
    }

    private function requestIs(string $verb): bool
    {
        return $_SERVER['REQUEST_METHOD'] === $verb;
    }
    
    private function callMiddlewares(array $middlewares)
    {
        foreach ($middlewares as $middleware => $method) {
            $middleware = new $middleware();
            $middleware->$method();
        }
    }

    private function callController(string $controller, string $method)
    {
        if (!method_exists($controller, $method)) {
            throw new InvalidArgumentException('Impossible d\'appeler la méthode du contrôleur');
        }
        $controller = new $controller();
        $controller->$method();
    }
}
