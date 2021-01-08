<?php

class Content{
    private $category;
    private $is_public;
    private $title;

    public function __construct($category,bool $is_public, $title)
    {
        $this->category = $category;
        $this->is_public = $is_public;
        $this->title = $title;
    }


    public function getCategory() : string
    {
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function isIsPublic(): bool
    {
        return $this->is_public;
    }

    public function setIsPublic(bool $is_public): void
    {
        $this->is_public = $is_public;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function showCondition() : bool{
        if (!isset($_COOKIE['user']) && !$this->isIsPublic()){
            return false;
        }
        return true;
    }

}