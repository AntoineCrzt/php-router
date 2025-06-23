<?php

namespace Controllers;

use Models\Category;
use Models\Topic;

class CategoryAndTopicsController
{
    private Category $categoriesModel;
    private Topic $topicsModel;

    public function __construct()
    {
        $this->categoriesModel = new Category();
        $this->topicsModel = new Topic();
    }

    public function showCategory()
    {
        $category = $_GET['name'];
        $topics = $this->categoriesModel->getTopicsByCategory($category);
        $logged_in = $_SESSION['auth'] ?? false;
        require '../views/category.php';
    }

    public function showTopic()
    {
        $logged_in = $_SESSION['auth'] ?? false;
        $topic = $this->topicsModel->getTopic($_GET['id']);
        require '../views/topic.php';
    }

    public function createMessage()
    {
        if (empty($_POST['message'])) {
            // Erreur
        }

        if (empty($_POST['topic_id']) or !is_numeric($_POST['topic_id'])) {
            // Erreur
        }

        $this->topicsModel->addNewMessage($_POST['topic_id'], $_POST['message']);

        return header('location: ?action=topic&id=' . $_POST['topic_id']);
    }
}
