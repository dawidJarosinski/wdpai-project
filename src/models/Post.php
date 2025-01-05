<?php

class Post {
    private $id;
    private $categoryId;
    private $title;
    private $content;
    private $author;
    private $createdAt;

    public function __construct($id, $categoryId, $title, $content, $author, $createdAt) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->createdAt = $createdAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function getTitle() {
        return $this->title;
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