<?php

class Content{
    private $category;
    private $title;
    private $file;

    public function __construct($category, $title, $file)
    {
        $this->category = $category;
        $this->title = $title;
        $this->file = $file;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
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

    public function getFile() : string
    {
        return $this->file;
    }


    public function setFile(string $file)
    {
        $this->file = $file;
    }
}