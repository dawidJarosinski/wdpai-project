<?php
require_once 'AppController.php';
class CategoryController
{
    public function category() {
        $categoryId = $_GET['id'];
        $database = new Database();
        $category = $database->getCategoryById($categoryId);
        $posts = $database->getPostsByCategory($categoryId);
        return $this->render('category', ['category' => $category, 'posts' => $posts]);
    }
}