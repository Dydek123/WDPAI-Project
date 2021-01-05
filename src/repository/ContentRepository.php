<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Content.php';

class ContentRepository extends Repository
{

    public function getContent(int $id): ?Content
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Contents" WHERE id_contents = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $content = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($content == false) {
            return null;
        }

        return new Content(
            $content['documentType'],
            $content['file'],
            $content['public']
        );
    }

    public function addNewContent(Content $content): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Contents" (id_raports, id_users, is_public, title)
            VALUES (?, ?, ?, ?)
        ');

        $id_user = 1;
        $id_raports = $this->getDocumentID($content->getCategory());
        $stmt->execute([
            $id_raports,
            $id_user,
            $content->isIsPublic(),
            $content->getTitle()
        ]);
    }

    private function getDocumentID($name){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.documents WHERE title = :title
        ');
        $stmt->bindParam(':title', $name, PDO::PARAM_INT);
        $stmt->execute();

        $tmp = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tmp['id_documents'];
    }

    public function getContents(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT  d.title as category, c.title as content, is_public FROM "Contents" c LEFT JOIN documents d on d.id_documents = c.id_raports;
        ');
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document){
            $result[] = new Content(
                $document['category'],
                $document['is_public'],
                $document['content']
            );
        }

        return $result;
    }
}