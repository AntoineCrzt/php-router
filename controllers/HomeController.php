<?php

namespace Controllers;

use Models\Category;

class HomeController
{
    private Category $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }
    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        $logged_in = $_SESSION['auth'] ?? false;
        require '../views/index.php';
    }
}
