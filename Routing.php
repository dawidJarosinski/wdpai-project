<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/AuthController.php';
require_once 'src/controllers/ForumController.php';
require_once 'src/controllers/PostController.php';
require_once 'src/controllers/CommentController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if(!array_key_exists($action, self::$routes)) {
            die("Wrong url");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: "forum";

        $object->$action();
    }
}