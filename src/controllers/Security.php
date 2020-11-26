<?php


require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class Security extends AppController
{
    public function login_user(){
        $user = new User('example@email.com','admin','admin');


        $name = $_POST["username"];
        $password = $_POST["password"];

        if ($user->getName() !== $name){
            return $this->render('login',['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Incorrect password']]);
        }

        return $this->render('index');
    }
}