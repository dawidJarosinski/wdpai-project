<?php
require_once 'AppController.php';
require_once __DIR__.'/../repositories/PostRepository.php';
require_once __DIR__.'/../repositories/CommentRepository.php';
class PostController extends AppController
{
    public function post() {
        $postId = $_GET['id'];
        $postRepository = new PostRepository();
        $commentRepository = new CommentRepository();
        $post = $postRepository->getPostById($postId);
        $comments = $commentRepository->getCommentsByPostId($postId);
        return $this->render('post', ['post' => $post, 'comments' => $comments]);
    }

    public function addPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];
            $authorId = $_SESSION['user']['id'];

            $postRepository = new PostRepository();
            $postRepository->addPost($title, $content, $categoryId, $authorId);

            header("Location: /category?id=$categoryId");
        }
    }
}