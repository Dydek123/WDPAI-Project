<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Document.php';

class DocumentsRepository extends Repository
{

    public function getDocument(int $id): ?Document
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.documents WHERE id_documents = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $document = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($document == false) {
            return null;
        }

        return new Document(
            $document['icon'],
            $document['background'],
            $document['title'],
            $document['description'],
            $document['category']
        );
    }

    public function addDocument(Document $document): int
    {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            INSERT INTO documents (id_categories, icon, background, title, description)
            VALUES (?, ?, ?, ?, ?)
        ');

        $id_category = 0;
        if($document->getCategory() === 'raports'){
            $id_category = 1;
        }
        else if($document->getCategory() === 'documentation'){
            $id_category = 2;
        }
        $stmt->execute([
            $id_category,
            $this->iconName($document->getIcon()),
            $document->getBackground(),
            $document->getTitle(),
            $document->getDescription()
        ]);

        return $conn->lastInsertId();
    }

    public function getDocuments(): array
    {
        $result = [];
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM documents d LEFT JOIN "Categories" C on C.id_categories = d.id_categories;
        ');
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document){
            $result[] = new Document(
                $document['icon'],
                $document['id_documents'].'_'.$document['background'],
                $document['title'],
                $document['description'],
                $document['name']
            );
        }

        return $result;
    }

    private function iconName($icon){
        switch ($icon){
            case 'dolar':
                return 'fa-dollar-sign';
            case 'user':
                return 'fa-users';
            case 'mail':
                return 'fa-envelope';
            case 'book':
                return 'fa-book-open';
        }
    }
}