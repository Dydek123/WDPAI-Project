<?php


class Document
{
    private $icon;
    private $background;
    private $title;
    private $description;
    private $category;

    public function __construct(string $icon,string  $background,string  $title,string  $description,string  $category)
    {
        $this->icon = $icon;
        $this->background = $background;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }



}