<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function login() {
        $this -> render('login');
    }

    public function index() {
        $this -> render('index');
    }

    public function error() {
        $this -> render('error');
    }
}