<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';
class PostRepository extends Repository
{

    public function getPostsByCategoryId($categoryId) {
        $stmt = $this->database->connect()->prepare("SELECT * FROM posts WHERE category_id = :category_id ORDER BY created_at DESC");
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($posts as $post) {
            $result[] = new Post($post['id'], $post['category_id'], $post['title'], $post['content'], $post['author_id'], $post['created_at'], $post['image_path']);
        }
        return $result;
    }

    public function getPostById($postId) {
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM posts WHERE id = :post_id
        ");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post) {
            return new Post(
                $post['id'],
                $post['category_id'],
                $post['title'],
                $post['content'],
                $post['author_id'],
                $post['created_at'],
                $post['image_path']
            );
        }

        return null;
    }

    public function addPost(string $title, string $content, int $categoryId, int $authorId, string $imagePath) {
        $currentDate = date('Y-m-d H:i:s');

        $stmt = $this->database->connect()->prepare("
            INSERT INTO posts (title, content, category_id, author_id, created_at, image_path)
            VALUES (:title, :content, :category_id, :author_id, :created_at, :image_path)
            ");

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $currentDate, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $imagePath, PDO::PARAM_STR);
        $stmt->execute();
    }
}