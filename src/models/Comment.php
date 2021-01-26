<?php


class Comment
{
    private $authorName;
    private $authorSurname;
    private $comment;
    private $date;

    public function __construct(string $authorName, string $authorSurname, string $comment, string $date)
    {
        $this->authorName = $authorName;
        $this->authorSurname = $authorSurname;
        $this->comment = $comment;
        $this->date = $date;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    public function getAuthorSurname(): string
    {
        return $this->authorSurname;
    }

    public function setAuthorSurname(string $authorSurname): void
    {
        $this->authorSurname = $authorSurname;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }
}