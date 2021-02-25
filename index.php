<?php

require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('login','DefaultController');
Routing::get('error','DefaultController');
Routing::get('finances','ContentController');
Routing::get('raports','CategoryController');
Routing::get('logout','SecurityController');

Routing::post('register','SecurityController');
Routing::post('addUser','SecurityController');
Routing::post('login_user', 'SecurityController');
Routing::post('profile', 'SecurityController');
Routing::post('change_password', 'SecurityController');
Routing::post('change_email', 'SecurityController');
Routing::post('delete_user', 'SecurityController');
Routing::post('make_admin', 'SecurityController');

Routing::post('setNewPassword','ResetPasswordController');
Routing::post('forgotPassword','ResetPasswordController');
Routing::post('addCategory', 'CategoryController');
Routing::post('addContent', 'ContentController');
Routing::post('subcategories', 'ContentController');
Routing::post('search', 'ContentController');
Routing::post('deleteVersion', 'ContentController');
Routing::post('docx', 'ContentController');
Routing::post('newComment', 'ContentController');

Routing::run($path);