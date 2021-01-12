<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Content.php';
require_once __DIR__.'/../repository/ContentRepository.php';
require_once __DIR__.'/../repository/VersionRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ContentController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    const UPLOAD_DIRECTORY = '/../public/uploads/Documents/';

    private $message = [];
    private $contentRepository;
    private $versionRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->contentRepository = new ContentRepository();
        $this->versionRepository = new VersionRepository();
        $this->userRepository = new UserRepository();
    }

    public function finances() {
        $contents = $this->contentRepository->getContents();
        $versions = $this->versionRepository->getVersions();
        $categoryList = $this->createUniqueCategoryList($contents);
        $this -> render('finances', ['contents'=>$contents, 'categoryList'=>$categoryList, 'versions'=>$versions]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === 'application/json') {
            $content = (file_get_contents('php://input'));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->contentRepository->getContentByTitle($decoded['search']));
        }
    }

    public function addContent(){
        if (isset($_COOKIE['user'])) {
            if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                $user = $this->userRepository->getUserFromCookie($_COOKIE['user']);

                $date = new DateTime();
                if ($_POST['document-name'] === "new" || $this->contentValidate()) {
                    $newContent = new Content($_POST['document-type'], (int)$_POST['public'], $_POST['title'], '');
                    $this->contentRepository->addNewContent($newContent);
                    $newVersion = new Version(0, $_POST['title'], $_FILES['file']['name'], $date->format('Y-m-d'), $user->getName(), $user->getSurname());
                    $id = $this->versionRepository->addNewVersion($newVersion);
                } else {
                    $newVersion = new Version(0, $_POST['document-name'], $_FILES['file']['name'], $date->format('Y-m-d'), $user->getName(), $user->getSurname());
                    $id = $this->versionRepository->addNewVersion($newVersion);
                }

                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY .$id.'_'. $_FILES['file']['name']
                );

                return $this->render("index");
            }

            return $this->render('upload_content', ['messages' => $this->message]);
        }
        echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        return $this->render("login");
    }

    private function createUniqueCategoryList($contents): array
    {
        $categoryList = array();
        foreach ($contents as $content){
            if (!in_array($content->getCategory(), $categoryList)){
                $categoryList[] = $content->getCategory();
            }
        }
        return $categoryList;
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
    }

    private function contentValidate()
    {
        if (!isset($_POST['public']) || !isset($_POST['category']) || !isset($_POST['document-type']) || !isset($_POST['title'])){
            return false;
        }
        return true;
    }
}
