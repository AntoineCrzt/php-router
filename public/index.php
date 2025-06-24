<?php

require './../vendor/autoload.php';

use App\Route;
use App\Router;
use Controllers\AuthController;
use Controllers\CategoryAndTopicsController;
use Controllers\HomeController;
use Middlewares\Authentication;
use Middlewares\Stats;

session_start();

$action = $_GET['action'] ?? '';

try {
    $router = new Router($action, [
        new Route(['action' => '', 'controller' => HomeController::class, 'method' => 'index', 'middlewares' => [Stats::class => 'getStats']]),
        new Route(['action' => 'login', 'controller' => AuthController::class, 'method' => 'login']),
        new Route(['action' => 'topic', 'controller' => CategoryAndTopicsController::class, 'method' => 'showTopic', 'middlewares' => [Stats::class => 'getStats'], 'parameters' => ['id']]),
        new Route(['action' => 'category', 'controller' => CategoryAndTopicsController::class, 'method' => 'showCategory', 'middlewares' => [Stats::class => 'getStats'], 'parameters' => ['name']]),
        new Route(['action' => 'create-message', 'verb' => 'POST', 'controller' => CategoryAndTopicsController::class, 'method' => 'createMessage', 'middlewares' => [Authentication::class => 'checkAuth']])
    ]);
    $router->route();
} catch (InvalidArgumentException $e) {
    // Gérer les erreurs, par exemple, si mode debug activé : 
    var_dump($e->getMessage());
}
