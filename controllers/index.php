<?php

$nb_users = 1000;
$nb_topics = 500;
$nb_messages = 4242;
require_once '../models/categories.php';

function index()
{
    $logged_in = $_SESSION['auth'] ?? false;
    $categories = getCategories();
    require '../views/index.php';
}
