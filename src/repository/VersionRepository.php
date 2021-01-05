<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Version.php';

class VersionRepository extends Repository
{

    public function getVersion(int $id): ?Version
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Versions" WHERE id_versions = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $version = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($version == false) {
            return null;
        }

        return new Version(
            $version['id_contents'],
            $version['file'],
            $version['datetime']
        );
    }

    public function addNewVersion(Version $version): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Versions" (id_contents, datetime, file)
            VALUES (?, ?, ?)
        ');

        $date = new DateTime();
        $id_contents = $this->getContentID($version->getDocument());
//        die(strval($id_contents)." ".$date->format('Y-m-d')." ".$version->getFile());
        $stmt->execute([
            $id_contents,
            $date->format('Y-m-d'),
            $version->getFile()
        ]);
    }

    private function getContentID($name){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Contents" WHERE title = :title
        ');
        $stmt->bindParam(':title', $name, PDO::PARAM_INT);
        $stmt->execute();

        $tmp = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tmp['id_contents'];
    }

    public function getVersions(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT datetime, file, title FROM "Versions" LEFT JOIN "Contents" C on C.id_contents = "Versions".id_contents;
        ');
        $stmt->execute();
        $versions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($versions as $version){
            $result[] = new Version(
                $version['title'],
                $version['file'],
                $version['datetime']
            );
        }

        return $result;
    }
}