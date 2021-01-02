<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login_user(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login_user');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);
        if (!$user){
            return $this->render('login',['messages' => ['Użytkownik nie istnieje']]);
        }

        if (($user->getEmail() !== $email) || ($user->getPassword() !== $password)){
            return $this->render('login',['messages' => ['Nieprawidłowe dane']]);
        }

        return $this->render('index');
    }
}
