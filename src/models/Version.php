<?php


class Version
{
    private $document;
    private $file;

    public function __construct($document, $file)
    {
        $this->document = $document;
        $this->file = $file;
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


}