<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    public function login_user(){
        $user = new User('admin','admin','admin@wp.pl');

//        if ($this->isPost()){
//            return $this->login_user('login_user');
//        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (($user->getUsername() !== $username) || ($user->getPassword() !== $password)){
            return $this->render('login',['messages' => ['Nieprawidłowe dane']]);
        }

        return $this->render('index');
    }
}
