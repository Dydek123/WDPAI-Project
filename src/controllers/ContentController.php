<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Content.php';
require_once __DIR__.'/../repository/ContentRepository.php';
require_once __DIR__.'/../repository/VersionRepository.php';

class ContentController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    const UPLOAD_DIRECTORY = '/../public/uploads/Documents/';

    private $message = [];
    private $contentRepository;
    private $versionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->contentRepository = new ContentRepository();
        $this->versionRepository = new VersionRepository();
    }

    public function finances() {
        $contents = $this->contentRepository->getContents();
        $versions = $this->versionRepository->getVersions();
        $categoryList = $this->createUniqueCategoryList($contents);
        $this -> render('finances', ['contents'=>$contents, 'categoryList'=>$categoryList, 'versions'=>$versions]);
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

    public function addContent(){
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            if($_POST['document-name'] === "new" || $this->contentValidate()){
                $newContent = new Content($_POST['document-type'], $_POST['public'], $_POST['title']);
                $this->contentRepository->addNewContent($newContent);
            }
            else{
                $newVersion = new Version($_POST['document-name'],$_FILES['file']['name']);
                $this->versionRepository->addNewVersion($newVersion);
            }

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
    }

    private function contentValidate()
    {
        if (!isset($_POST['public']) || !isset($_POST['category']) || !isset($_POST['document-type']) || !isset($_POST['title'])){
            return false;
        }
        return true;
    }
}
