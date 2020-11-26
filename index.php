<?php

require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

routing::get('', 'DefaultController');
routing::get('login','DefaultController');
routing::get('register','DefaultController');

routing::post('login_user','Security');


routing::run($path);