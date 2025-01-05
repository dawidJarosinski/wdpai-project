<?php

require_once 'AppController.php';
class CommentController extends AppController
{
    public function addComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'];
            $content = $_POST['content'];
            $authorId = $_SESSION['user']['id'];

            $commentRepository = new CommentRepository();
            $commentRepository->addComment($postId, $content, $authorId);

            header("Location: /post?id=$postId");
        }
    }
}