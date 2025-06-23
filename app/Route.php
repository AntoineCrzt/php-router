<?php

namespace App;

class Route
{
    private string $action = '';
    private string $verb = 'GET';
    private ?string $controller = null;
    private string $method = '';
    private array $parameters = [];
    private array $middlewares = [];
}
