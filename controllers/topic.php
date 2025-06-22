<?php
session_start();
$nb_users = 1000;
$nb_topics = 500;
$nb_messages = 4242;

$logged_in = $_SESSION['auth'] ?? false;

require '../models/topics.php';

if (empty($_GET['id'])) {
    return header('location:index.php');
}
$topic = getTopic($_GET['id']);
require '../views/topic.php';
