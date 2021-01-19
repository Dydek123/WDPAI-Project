<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $conn = Connection::getInstance();
        $stmt = $conn->getConnection()->prepare('
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
            SELECT * FROM public.users u
            LEFT JOIN "Users_details" Ud on Ud.id_users_details = u.id_user_details 
            WHERE md5(email) = :email
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

    public function getUserIDFromCookie(string $email): int
    {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM public.users WHERE md5(email) = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return 0;
        }

        return $user['id'];
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

    public function isEmailUnique(string $email) : bool {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT COUNT(*) FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$user['count'];
    }

    public function changePassword(string $password){
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            UPDATE public.users SET password = :password WHERE id = :id;
        ');

        $id = $this->getUserIDFromCookie($_COOKIE['user']);
        $hashedPassword = md5(md5($password));
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function changeEmail(string $email){
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            UPDATE public.users SET email = :email WHERE id = :id;
        ');

        $id = $this->getUserIDFromCookie($_COOKIE['user']);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    private function checkUserDetails($name, $surname)
    {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            SELECT * FROM "Users_details" WHERE name=:name AND surname=:surname;
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);

        $stmt->execute();

        $exist_user_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($exist_user_details == false) {
            $stmt = $conn->prepare('
                INSERT INTO "Users_details" (name, surname)
                VALUES (?, ?)
            ');
            $stmt->execute([
                $name,
                $surname
            ]);
        }

        $stmt = $conn->prepare('
            SELECT * FROM "Users_details" WHERE name=:name AND surname=:surname;
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);

        $stmt->execute();

        $exist_user_details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $exist_user_details['id_users_details'];
    }

    public function deleteUserByAdmin(string $email) : bool {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            DELETE FROM public.users WHERE email=:email AND id_role=1;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        return $count;
    }

    public function changeUserToAdmin(string $email) : bool {
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            UPDATE public.users SET id_role = 2 WHERE email = :email AND id_role = 1;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        return $count;
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