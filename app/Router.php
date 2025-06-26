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
                if ($route->hasParameters() and !$this->parametersMatch($route->parameters())) {
                    throw new BadParameterException("Des paramètres de la route sont incorrects");
                }
                if ($route->hasMiddlewares()) {
                    $this->callMiddlewares($route->middlewares());
                }
                $this->callController($route->controller(), $route->method());
            }
        }
    }

    private function parametersMatch(array $parameters)
    {
        foreach ($parameters as $parameter => $constraints) {
            if (is_string($constraints)) {
                $parameter = $constraints;
            }
            if ($this->parameterIsRequired($constraints) and empty($_GET[$parameter])) {
                return false;
            }
            if (!$this->parameterHasGoodFormat($parameter, $constraints)) {
                return false;
            }
        }
        return true;
    }

    private function parameterHasGoodFormat(string $parameter, array|string $constraints): bool
    {
        if (is_array($constraints) and isset($constraints['format']) and !empty($_GET[$parameter])) {
            return preg_match('/^' . $constraints['format'] . '$/', $_GET[$parameter]);
        }
        return true;
    }

    private function parameterIsRequired(array|string $constraints): bool
    {
        if (!is_array($constraints)) {
            return true;
        }
        // Le paramètre est requis s'il n'y a pas required OU que required est true
        return !isset($constraints['required']) || $constraints['required'];
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
