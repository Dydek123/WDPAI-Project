<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Document.php';

class DocumentsRepository extends Repository
{

    public function getDocument(int $id): ?Document
    {
        $stmt = $this->database->connect()->prepare('
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

    public function addDocument(Document $document): void
    {
        $stmt = $this->database->connect()->prepare('
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