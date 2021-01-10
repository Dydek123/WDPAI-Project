<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['name'],
            $user['surname'],
            $user['password'],
            $user['email'],
            $user['id_role']
        );
    }

    public function getUserFromCookie(string $email): ?User
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.users WHERE md5(email) = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['name'],
            $user['surname'],
            $user['password'],
            $user['email'],
            $user['id_role']
        );
    }

    public function addUser(User $newUser)
    {
        if ($this->validateEmail($newUser->getEmail())) {
            $stmt = Connection::getInstance()->getConnection()->prepare('
                INSERT INTO users (password, email, id_role, id_user_details)
                VALUES (?, ?, ?, ?)
            ');
            $id_role = 1;
            $id_details = $this->checkUserDetails($newUser->getName(), $newUser->getSurname());
            $password = md5(md5($newUser->getPassword()));
            $stmt->execute([
                $password,
                $newUser->getEmail(),
                $id_role,
                $id_details
            ]);
        }
    }

    private function checkUserDetails($name, $surname)
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM "Users_details" WHERE name=:name AND surname=:surname;
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);

        $stmt->execute();

        $exist_user_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($exist_user_details == false) {
            $stmt = Connection::getInstance()->getConnection()->prepare('
                INSERT INTO "Users_details" (name, surname)
                VALUES (?, ?)
            ');
            $stmt->execute([
                $name,
                $surname
            ]);
        }

        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM "Users_details" WHERE name=:name AND surname=:surname;
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);

        $stmt->execute();

        $exist_user_details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $exist_user_details['id_users_details'];
    }

    private function validateEmail($email) : bool{
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT count(email) FROM users WHERE email= :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $exist_email = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($exist_email['count']){
            return false;
        }
        return true;
    }
}