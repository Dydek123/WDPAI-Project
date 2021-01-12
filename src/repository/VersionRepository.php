<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Version.php';

class VersionRepository extends Repository
{

    public function getVersion(int $id): ?Version
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.version_details WHERE id_versions = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $version = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($version == false) {
            return null;
        }

        return new Version(
            $version['title'],
            $version['file'],
            $version['datetime'],
            $version['name'],
            $version['surname']
        );
    }

    public function addNewVersion(Version $version): void
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            INSERT INTO "Versions" (id_contents, datetime, file, id_user)
            VALUES (?, ?, ?, ?)
        ');

        $date = new DateTime();
        $author = new UserRepository();
        $user = $author->getUserIDFromCookie($_COOKIE['user']);
        $id_contents = $this->getContentID($version->getDocument());
        $stmt->execute([
            $id_contents,
            $date->format('Y-m-d'),
            $version->getFile(),
            $user
        ]);
    }

    public function getVersions(): array
    {
        $result = [];

        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.version_details ORDER BY datetime DESC ;
        ');
        $stmt->execute();
        $versions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($versions as $version){
            $result[] = new Version(
                $version['title'],
                $version['file'],
                $version['datetime'],
                $version['name'],
                $version['surname']
            );
        }

        return $result;
    }

    private function getContentID($name){
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public."Contents" WHERE title = :title
        ');
        $stmt->bindParam(':title', $name, PDO::PARAM_INT);
        $stmt->execute();

        $tmp = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tmp['id_contents'];
    }

}