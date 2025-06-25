<?php

namespace App;

use InvalidArgumentException;

class Route
{
    private string $action = '';
    private string $verb = 'GET';
    private ?string $controller = null;
    private string $method = '';
    private array $parameters = [];
    private array $middlewares = [];

    public function __construct(array $data)
    {
        foreach ($data as $property => $value) {
            $setter = 'set' . ucfirst($property);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } elseif (property_exists($this, $property)) {
                $this->$property = $value;
            } else {
                throw new InvalidArgumentException('La propriété n\'existe pas');
            }
        }
    }

    public function setController(string $controller)
    {
        if (!class_exists($controller)) {
            throw new InvalidArgumentException('Le controller n\'existe pas');
        }
        $this->controller = $controller;
    }

    public function setMiddlewares(array $middlewares)
    {
        foreach ($middlewares as $middleware => $method) {
            if (!class_exists($middleware)) {
                throw new InvalidArgumentException('Le middleware n\'existe pas');
            }
            if (!method_exists($middleware, $method)) {
                throw new InvalidArgumentException('La méthode du middleware n\'existe pas');
            }
        }
        $this->middlewares = $middlewares;
    }

    public function setVerb(string $verb)
    {
        $verb = strtoupper($verb);
        if (!in_array($verb, ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])) {
            throw new InvalidArgumentException('Le verbe HTTP est incorrect : ' . $verb);
        }
        $this->verb = $verb;
    }

    public function action(): string
    {
        return $this->action;
    }

    public function hasMiddlewares(): bool
    {
        return count($this->middlewares) > 0;
    }

    public function middlewares(): array
    {
        return $this->middlewares;
    }

    public function controller(): string
    {
        return $this->controller;
    }

    public function method(): string
    {
        return $this->method;
    }

    public function verb(): string
    {
        return $this->verb;
    }
}
