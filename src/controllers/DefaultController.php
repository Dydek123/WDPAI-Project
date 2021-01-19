<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function login() {
        if (isset($_COOKIE['user'])){
            header("location:javascript://history.go(-1)");
        }
        $this -> render('login');
    }

    public function index() {
        $this -> render('index');
    }

    public function error() {
        $this -> render('error');
    }
}