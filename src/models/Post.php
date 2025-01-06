<?php

class Post {
    private $id;
    private $categoryId;
    private $title;
    private $content;
    private $authorId;
    private $createdAt;

    private $imagePath;

    public function __construct($id, $categoryId, $title, $content, $author, $createdAt, $imagePath) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->imagePath = $imagePath;
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

    public function getAuthorId() {
        return $this->author;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

}