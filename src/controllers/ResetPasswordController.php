<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/ResetPassword.php';
require_once __DIR__.'/../repository/ResetPasswordRepository.php';

class ResetPasswordController extends AppController{
    private $resetPasswordRepository;

    public function __construct() {
        parent::__construct();
        $this->resetPasswordRepository = new ResetPasswordRepository();
    }

    public function forgotPassword() {
        if ($this->isPost()){
            $this->resetPasswordRepository->setKey($_POST['email']);
            return $this->render('forgot_password',['status' => ['keySet']]);
        }
        $this->render('forgot_password');
    }

    public function setNewPassword() {

        if ($this->isPost() && $this->validatePassword($_POST['password'], $_POST['repeat-password'])) {
            if ($this->resetPasswordRepository->checkKey($_POST['email'], $_POST['key'])){
                $this->resetPasswordRepository->setPassword($_POST['email'],$_POST['password']);
                return $this->render("index", ['messages' => ['Zmieniono hasło']]);
            }
            return $this->render("setNewPassword", ['messages' => ['Nie udało się zmienić hasła']]);
        }
        return $this->render('setNewPassword', ['messages' => ['Nieprawidłowe dane']]);
    }

    private function validatePassword($password, $repeatPassword) : bool
    {
        return $password===$repeatPassword;
    }
}