<?php

require_once 'AppController.php';
require_once __DIR__.'/../repositories/CategoryRepository.php';
require_once __DIR__.'/../repositories/PostRepository.php';
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__.'/../models/PostDto.php';
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

        $userRepository = new UserRepository();

        $postsDto = [];
        foreach($posts as $post) {
            $user = $userRepository->findUserById($post->getAuthorId());
            $postsDto[] = new PostDto(
                $post->getId(),
                $post->getCategoryId(),
                $post->getTitle(),
                $post->getContent(),
                $post->getAuthorId(),
                $post->getCreatedAt(),
                $user->getName(),
                $user->getSurname(),
                $post->getImagePath()
            );
        }

        return $this->render('category', ['posts' => $postsDto, 'category' => $category]);
    }
}