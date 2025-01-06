<?php

class CommentDto
{
    private $id;
    private $postId;
    private $content;
    private $author;
    private $createdAt;
    private $authorName;
    private $authorSurname;

    /**
     * @param $id
     * @param $postId
     * @param $content
     * @param $author
     * @param $createdAt
     * @param $authorName
     * @param $authorSurname
     */
    public function __construct($id, $postId, $content, $author, $createdAt, $authorName, $authorSurname)
    {
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->authorName = $authorName;
        $this->authorSurname = $authorSurname;
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
    public function getPostId()
    {
        return $this->postId;
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



}