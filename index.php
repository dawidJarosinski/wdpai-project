<?php
session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path=  parse_url($path, PHP_URL_PATH);

Routing::get('', 'ForumController');
Routing::get('login', 'DefaultController');
Routing::get('forum', 'ForumController');
Routing::get('register', 'DefaultController');
Routing::get('logout', 'AuthController');
Routing::get('category', 'ForumController');
Routing::get('post', 'PostController');
Routing::get('addPostForm', 'DefaultController');

Routing::post('login', 'AuthController');
Routing::post('register', 'AuthController');
Routing::post('addComment', 'CommentController');
Routing::post('addPost', 'PostController');
Routing::post('search', 'PostController');

Routing::run($path);
