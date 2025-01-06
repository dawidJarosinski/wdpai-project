<?php

class PostDto
{
    private $id;
    private $categoryId;
    private $title;
    private $content;
    private $author;
    private $createdAt;
    private $authorName;
    private $authorSurname;
    private $imagePath;

    /**
     * @param $id
     * @param $categoryId
     * @param $title
     * @param $content
     * @param $author
     * @param $createdAt
     * @param $authorName
     * @param $authorSurname
     */
    public function __construct($id, $categoryId, $title, $content, $author, $createdAt, $authorName, $authorSurname, $imagePath)
    {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->authorName = $authorName;
        $this->authorSurname = $authorSurname;
        $this->imagePath = $imagePath;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return mixed
     */
    public function getAuthorSurname()
    {
        return $this->authorSurname;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

}