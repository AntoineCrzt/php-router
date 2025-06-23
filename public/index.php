<?php
session_start();
$action = $_GET['action'] ?? '';
require '../controllers/index.php';
require '../controllers/login.php';
require '../controllers/categoryAndTopics.php';

require '../middlewares/authentification.php';
require '../middlewares/stats.php';
switch ($action) {
    case '':
        getStats();
        index();
        break;
    case 'login':
        login();
        break;
    case 'topic':
        getStats();
        showTopic();
        break;
    case 'category':
        if (empty($_GET['name'])) {
            return header('location: index.php?action=404');
        }
        getStats();
        showCategory();
        break;
    case 'create-message':
        checkAuth();
        createMessage();
        break;
    case '403':
        echo "Erreur : vous devez être authentifié";
        break;
    case '404':
        echo "Erreur : cette page n'existe pas";
        break;
}