<?php

class Comment
{
    private $id;
    private $postId;
    private $content;
    private $author;
    private $createdAt;

    public function __construct($id, $postId, $content, $author, $createdAt) {
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->author = $author;
        $this->createdAt = $createdAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }
}