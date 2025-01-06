<?php

class Comment
{
    private $id;
    private $postId;
    private $content;
    private $authorId;
    private $createdAt;

    public function __construct($id, $postId, $content, $authorId, $createdAt) {
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->authorId = $authorId;
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

    public function getAuthorId() {
        return $this->authorId;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }
}