<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }


    public function login_user(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login_user');
        }

        $email = $_POST['email'];
        $password = md5(md5($_POST['password']));

        $user = $userRepository->getUser($email);
        if (!$user){
            return $this->render('login',['messages' => ['Użytkownik nie istnieje']]);
        }

        if (($user->getEmail() !== $email) || ($user->getPassword() !== $password)){
            return $this->render('login',['messages' => ['Nieprawidłowe dane']]);
        }

        setcookie('user', $user->getEmail(), time() + (60*60*8)); //expires after 8 hours
        return $this->render('index');
    }

    public function register() {
        $this -> render('register');
    }

    public function addUser(){
        if ($this->isPost() && $this->validatePassword($_POST['password'], $_POST['repeat-password'])){
            $name = explode(' ', $_POST['name'])[0];
            $surname = explode(' ', $_POST['name'])[1];
            $newUser = new User($name, $surname, $_POST['password'], $_POST['email']);
            $this->userRepository->addUser($newUser);

            return $this->render("login");
        }

        return $this->render('register', ['messages' => 'Nieprawidłowe dane']);
    }


    private function validatePassword($password1, $password2) : bool
    {
        return $password1===$password2;
    }
}
