<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Comment.php';
date_default_timezone_set('Europe/Warsaw');
class CommentRepository extends Repository
{
    public function getCommentsByPostId($postId) {
        $stmt = $this->database->connect()->prepare("SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at ASC");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($comments as $comment) {
            $result[] = new Comment($comment['id'], $comment['post_id'], $comment['content'], $comment['author_id'], $comment['created_at']);
        }
        return $result;
    }

    public function addComment($postId, $content, $authorId) {
        $currentTime = date('Y-m-d H:i:s');

        $stmt = $this->database->connect()->prepare("
        INSERT INTO comments (post_id, content, author_id, created_at)
        VALUES (:post_id, :content, :author_id, :created_at)
    ");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $currentTime, PDO::PARAM_STR);
        $stmt->execute();
    }
}