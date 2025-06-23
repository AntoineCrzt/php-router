<?php
session_start();
$action = $_GET['action'] ?? '';
require '../controllers/index.php';
require '../controllers/login.php';
require '../controllers/categoryAndTopics.php';
switch ($action) {
    case '':
        index();
        break;
    case 'login':
        login();
        break;
    case 'topic':
        showTopic();
        break;
    case 'category':
        showCategory();
        break;
    case 'create-message':
        createMessage();
        break;
}