<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Content.php';

class ContentController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];

    public function addContent(){
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $type = explode(';', $_POST['category']);
            $newContent = new Content($type[0], $type[1], $_POST['file']['name']);

            return $this->render("finances", ['messages' => $this -> message, 'newContent' => $newContent]);
        }

        return $this->render('upload_content', ['messages' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }}
