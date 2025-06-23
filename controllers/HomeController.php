<?php

namespace Controllers;

use Models\Categorie;
use Models\Managers\CategoriesManager;

class HomeController
{
    private CategoriesManager $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoriesManager();
    }
    public function index()
    {
        $logged_in = $_SESSION['auth'] ?? false;
        $categories = $this->categoryModel->getCategories();
        require '../views/index.php';
    }
}
