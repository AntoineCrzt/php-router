<?php

$action = $_GET['action'] ?? '';
switch ($action) {
    case '': // C'est l'accueil
        require '../controllers/index.php';
        break;
    case 'login':
        require '../controllers/login.php';
        break;
    case 'topic':
        require '../controllers/topic.php';
        break;
    case 'category':
        require '../controllers/category.php';
        break;
    case 'create-message':
        require '../controllers/create-message.php';
        break;
}
