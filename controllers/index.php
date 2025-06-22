<?php
session_start();
$nb_users = 1000;
$nb_topics = 500;
$nb_messages = 4242;
require_once '../models/categories.php';

$logged_in = $_SESSION['auth'] ?? false;
$categories = getCategories();

require '../views/index.php';
