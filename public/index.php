<?php

require './../vendor/autoload.php';

use Controllers\AuthController;
use Controllers\CategoryAndTopicsController;
use Controllers\HomeController;
use Middlewares\Authentication;
use Middlewares\Stats;

session_start();

$action = $_GET['action'] ?? '';

switch ($action) {
    case '':
        $middleware = new Stats();
        $middleware->getStats();
        $controller = new HomeController();
        $controller->index();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'topic':
        if (empty($_GET['id']) or !is_numeric($_GET['id'])) {
            return header('location:index.php');
        }
        $middleware = new Stats();
        $middleware->getStats();
        $controller = new CategoryAndTopicsController();
        $controller->showTopic();
        break;
    case 'category':
        if (empty($_GET['name'])) {
            return header('location: index.php?action=404');
        }
        $middleware = new Stats();
        $middleware->getStats();
        $controller = new CategoryAndTopicsController();
        $controller->showCategory();
        break;
    case 'create-message':
        $middleware = new Authentication();
        $middleware->checkAuth();
        $controller = new CategoryAndTopicsController();
        $controller->createMessage();
        break;
    case '403':
        echo 'Erreur 403';
        break;
    case '404':
        echo 'Erreur 404';
        break;
}
