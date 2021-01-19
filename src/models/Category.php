<?php

class Category{
    private $title;
    private $description;
    private $category;
    private $icon;
    private $background;

    public function __construct($title, $description, $category, $icon, $background)
    {
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->icon = $icon;
        $this->background = $background;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getCategory() : string
    {
        return $this->category;
    }


    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getIcon() : string
    {
        return $this->icon;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
    }

    public function getBackground() : string
    {
        return $this->background;
    }

    public function setBackground(string $background)
    {
        $this->background = $background;
    }


}