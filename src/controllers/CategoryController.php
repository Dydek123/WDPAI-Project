<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Document.php';
require_once __DIR__.'/../repository/DocumentsRepository.php';
require_once __DIR__.'/../repository/ContentRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class CategoryController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/Category/';

    private $message = [];
    private $documentRepository;
    private $userRepository;
    private $contentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->documentRepository = new DocumentsRepository();
        $this->contentRepository = new ContentRepository();
        $this->userRepository = new UserRepository();
    }

    public function raports() {
        $categories = $this->documentRepository->getDocuments();
        $links = $this->contentRepository->getContents();
        if (isset($_COOKIE['user']))
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user'])->getRole();
        else
            $userRole = '0';
//        var_dump($categories[0]);
//        die();
        $this -> render('raports', ['categories' => $categories, 'links' => $links, 'role' => $userRole]);
    }

    public function addCategory(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            if($userRole->getRole()==='1'){
                echo '<script>alert("Nie masz odpowiednich uprawnień")</script>';
                return $this->render('index');
            }
            if ($this->isPost() && is_uploaded_file($_FILES['background']['tmp_name']) && $this->validate($_FILES['background'])) {
                $newCategory = new Document($_POST['icon'], $_FILES['background']['name'], $_POST['title'], $_POST['description'], $_POST['category']);
                $id = $this->documentRepository->addDocument($newCategory);

                move_uploaded_file(
                    $_FILES['background']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY .$id.'_'.$_FILES['background']['name']
                );

                return $this->render("index");
            }

            return $this->render('upload_file', ['messages' => $this->message]);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
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
