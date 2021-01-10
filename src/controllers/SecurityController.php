<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/LogsRepository.php';

class SecurityController extends AppController{
    private $userRepository;
    private $logsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->logsRepository = new LogsRepository();
    }


    public function login_user(){
        $userRepository = new UserRepository();

        if (isset($_COOKIE['user'])){
            if (isset($_COOKIE['user'])){
                header("location:javascript://history.go(-1)");
            }
        }

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

        setcookie('user', md5($user->getEmail()), time() + (60*60*8)); //expires after 8 hours
        $this->logsRepository->setLogs($user->getEmail());
        return $this->render('index');
    }

    public function logout(){
        if (isset($_COOKIE['user'])) {
            if ($_GET['logout']) {
                setcookie('user', null, time() - 600); //delete cookies by set time in the past
                $this->logsRepository->editLogs($_COOKIE['user']);
            }
        }
        return $this->render('index');
    }

    public function register() {
        if (isset($_COOKIE['user'])){
            header("location:javascript://history.go(-1)");
        }
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
