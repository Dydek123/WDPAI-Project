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

    public function profile(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            return $this->render('profile', ['user' => $userRole]);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
    }

    public function change_password(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            if (!$this->isPost()){
                return $this->render('change_password');
            }
            if ($this->validatePassword($_POST['password'], $_POST['password-repeat'])) {
                $this->userRepository->changePassword($_POST['password']);
                return $this->render('profile', ['messages' => ['Poprawnie zmieniono hasło'], 'status' => 'successful', 'user' => $userRole]);
            }
            return $this->render('change_password', ['messages' => ['Wprowadzone hasłą nie są takie same'] ,'status' => 'error']);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
    }

    public function change_email(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            if (!$this->isPost()){
                return $this->render('change_email');
            }
            if (!$this->isValidEmail($_POST['email'])) {
                return $this->render('change_email', ['messages' => ['Niepoprawna forma adresu email'], 'status' => 'error']);
            }
            if (!$this->userRepository->isEmailUnique($_POST['email'])){
                return $this->render('change_email', ['messages' => ['Taki adres email już istnieje'], 'status' => 'error']);
            }
            $this->userRepository->changeEmail($_POST['email']);
            setcookie('user', md5($_POST['email']), time() + (60*60*8)); //expires after 8 hours
            return $this->render('profile', ['messages' => ['Poprawnie zmieniono email'], 'status' => 'successful', 'user' => $userRole]);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
    }

    public function delete_user(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            if($userRole->getRole()==='1'){
                echo '<script>alert("Nie masz odpowiednich uprawnień")</script>';
                return $this->render('index');
            }
            if ($this->isPost()) {
                if (!$this->isValidEmail($_POST['email'])) {
                    return $this->render('delete_user', ['messages' => ['Niepoprawna forma adresu email'], 'status' => 'error']);
                }
                if ($this->userRepository->deleteuserByAdmin($_POST['email'])){
                    return $this->render('profile', ['messages' => ['Usunięto użytkownika'], 'status' => 'successful', 'user' => $userRole]);
                }
                return $this->render('delete_user', ['messages' => ['Nie udało się usunąć użytkownika'], 'status' => 'error']);
            }
            return $this->render('delete_user', ['messages' => $this->message]);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
    }

    public function make_admin(){
        if (isset($_COOKIE['user'])) {
            $userRole = $this->userRepository->getUserFromCookie($_COOKIE['user']);
            if($userRole->getRole() === '1'){
                echo '<script>alert("Nie masz odpowiednich uprawnień")</script>';
                return $this->render('index');
            }
            if ($this->isPost()) {
                if (!$this->isValidEmail($_POST['email'])) {
                    return $this->render('make_admin', ['messages' => ['Niepoprawna forma adresu email'], 'status' => 'error']);
                }
                if ($this->userRepository->changeUserToAdmin($_POST['email'])){
                    return $this->render('profile', ['messages' => ['Użytkownik stał się adminem'], 'status' => 'successful', 'user' => $userRole]);
                }
                return $this->render('make_admin', ['messages' => ['Nie udało się zmienić roli'], 'status' => 'error']);
            }
            return $this->render('make_admin', ['messages' => $this->message]);
        }
        else{
            echo '<script>alert("Zaloguj się aby przejść dalej")</script>';
        }
        return $this->render("login");
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

    private function isValidEmail(string $email)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
    }

}
