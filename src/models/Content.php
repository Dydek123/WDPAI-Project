<?php

class Content{
    private $category;
    private $is_public;
    private $title;
    private $background;

    public function __construct($category,bool $is_public, $title, string $background)
    {
        $this->category = $category;
        $this->is_public = $is_public;
        $this->title = $title;
        $this->background = $background;
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

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): void
    {
        $this->background = $background;
    }



    public function showCondition() : bool{
        if (!isset($_COOKIE['user']) && !$this->isIsPublic()){
            return false;
        }
        return true;
    }

}