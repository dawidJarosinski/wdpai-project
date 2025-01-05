<?php

require_once 'AppController.php';
require_once __DIR__.'/../repositories/CategoryRepository.php';
require_once __DIR__.'/../repositories/PostRepository.php';
require_once __DIR__.'/../repositories/UserRepository.php';
class ForumController extends AppController
{
    public function forum() {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAllCategories();
        return $this->render('forum', ['categories' => $categories]);
    }

    public function category() {
        $categoryId = $_GET['id'];
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->getCategoryById($categoryId);
        $postRepository = new PostRepository();
        $posts = $postRepository->getPostsByCategoryId($categoryId);
        return $this->render('category', ['posts' => $posts, 'category' => $category]);
    }
}