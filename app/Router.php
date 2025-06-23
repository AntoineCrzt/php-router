<?php

namespace App;

class Router
{
    private array $routes = [];
    private string $action = '';
    
    public function __construct(string $action, array $routes)
    {
        $this->action = $action;
        $this->routes = $routes;
    }
}
