<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function login() {
        $this -> render('login');
    }

    public function register() {
        $this -> render('register');
    }

    public function index() {
        $this -> render('index');
    }

    public function error() {
        $this -> render('error');
    }

    public function raports() {
        $this -> render('raports');
    }

}