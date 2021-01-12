<?php


class Version
{
    private $document;
    private $file;
    private $datetime;
    private $authorName;
    private $authorSurname;

    public function __construct($document, $file, $datetime, string $authorName, string $authorSurname)
    {
        $this->document = $document;
        $this->file = $file;
        $this->datetime = $datetime;
        $this->authorName = $authorName;
        $this->authorSurname = $authorSurname ;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument($document): void
    {
        $this->document = $document;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): void
    {
        $this->file = $file;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function setDatetime($datetime): void
    {
        $this->datetime = $datetime;
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



}