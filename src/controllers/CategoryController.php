<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Document.php';
require_once __DIR__.'/../repository/DocumentsRepository.php';

class CategoryController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/Category/';

    private $message = [];
    private $documentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->documentRepository = new DocumentsRepository();
    }

    public function addCategory(){
        if ($this->isPost() && is_uploaded_file($_FILES['background']['tmp_name']) && $this->validate($_FILES['background'])){
            move_uploaded_file(
                $_FILES['background']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['background']['name']
            );

//            die($_FILES['background']['name']);
//
            $newCategory = new Document($_POST['icon'], $_FILES['background']['name'], $_POST['title'], $_POST['description'], $_POST['category']);
            $this->documentRepository->addDocument($newCategory);

            return $this->render("raports", ['messages' => $this -> message, 'newCategory' => $newCategory]);
        }

        return $this->render('upload_file', ['messages' => $this->message]);
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
