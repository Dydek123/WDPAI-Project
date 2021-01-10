<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ResetPassword.php';

class ResetPasswordRepository
{
    public function checkKey($email, $key) : bool{
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM password_reset WHERE email=:email AND key=:key AND :expDate<CURRENT_TIMESTAMP;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':key', $key, PDO::PARAM_STR);
        $date = new DateTime();
        $format = $date->format('Y-m-d H:i:s');
        $stmt->bindParam(':expDate', $format, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
            return false;
        }

        return true;
    }

    public function setPassword($email, $newPassword){
        $stmt = Connection::getInstance()->getConnection()->prepare('
            UPDATE public.users SET password = :password WHERE email = :email;
        ');
        $password = md5(md5($newPassword));
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }
}