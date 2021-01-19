<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Content.php';
require_once __DIR__.'/../../Connection.php';

class ContentRepository extends Repository
{

    public function getContent(int $id): ?Content
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public."Contents" LEFT JOIN documents d on d.id_documents = "Contents".id_raports WHERE id_contents = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $content = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($content == false) {
            return null;
        }

        return new Content(
            $content['category'],
            $content['is_public'],
            $content['content'],
            $content['background']
        );
    }

    public function getContenstByCategory(string $category){
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            SELECT * FROM public.choose_document WHERE category=:category;
        ');

        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNewContent(Content $content): void
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            INSERT INTO "Contents" (id_raports, is_public, title)
            VALUES (?, ?, ?)
        ');
        $privateValue = (int)$content->isIsPublic();
        $id_raports = $this->getDocumentID($content->getCategory());
        $stmt->execute([
            $id_raports,
            (int)$content->isIsPublic(),
            $content->getTitle()
        ]);
    }

    public function getContents(): array
    {
        $result = [];
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT id_documents as id, d.title as category, d.background, c.title as content, is_public FROM "Contents" c LEFT JOIN documents d on d.id_documents = c.id_raports;
        ');
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document){
            $result[] = new Content(
                $document['category'],
                $document['is_public'],
                $document['content'],
                $document['id'].'_'.$document['background']
            );
        }

        return $result;
    }

    public function getContentByTitle(string $searchString) {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM contents_details WHERE LOWER(title) LIKE :search OR LOWER(name) LIKE :search
        ');
        $stmt->bindParam(':search',$searchString,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isUniqueTitle($title)
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT COUNT(*) FROM public."Contents" WHERE title = :title;
        ');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();

        $title = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$title['count'];
    }

    public function getFileByTitle($title){

    }

    private function getDocumentID($name){
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.documents WHERE title = :title
        ');
        $stmt->bindParam(':title', $name, PDO::PARAM_INT);
        $stmt->execute();

        $tmp = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tmp['id_documents'];
    }
}