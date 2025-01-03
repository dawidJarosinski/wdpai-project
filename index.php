<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path=  parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('forum', 'DefaultController');

Routing::post('login', 'AuthController');

Routing::run($path);