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
        $conn = Connection::getInstance()->getConnection();
        $stmt = $conn->prepare('
            UPDATE public.users SET password = :password WHERE email = :email;
        ');
        $password = md5(md5($newPassword));
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $conn->prepare('
            UPDATE public.password_reset SET status = :status WHERE email = :email;
        ');
        $status = 'done';
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function setKey($email){
        $key = $this->random_str();
        $stmt = Connection::getInstance()->getConnection()->prepare('
            CALL public.recoverykey(?, ?);
        ');
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $key, PDO::PARAM_STR);

        $stmt->execute();
    }

    private function random_str(
        int $length = 10,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        ): string
        {
            if ($length < 1) {
                throw new \RangeException("Length must be a positive integer");
            }
            $pieces = [];
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $pieces []= $keyspace[random_int(0, $max)];
            }
            return implode('', $pieces);
    }
}