<?php

require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('login','DefaultController');
Routing::get('register','DefaultController');
Routing::get('error','DefaultController');
Routing::get('raports','DefaultController');

Routing::post('login_user', 'SecurityController');
Routing::post('addCategory', 'CategoryController');

Routing::run($path);