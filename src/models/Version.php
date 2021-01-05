<?php


class Version
{
    private $document;
    private $file;
    private $datetime;


    public function __construct($document, $file, $datetime)
    {
        $this->document = $document;
        $this->file = $file;
        $this->datetime = $datetime;
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


}