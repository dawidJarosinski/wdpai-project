<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
class AuthController extends AppController {

    public function login() {
        $user = new User("test@test.com", "test123", "test", "test");

        if($this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if($user->getEmail() != $email) {
            return $this->render("login", ["messages" => ["user with this email not exists"]]);
        }

        if($user->getPassword() != $password) {
            return $this->render("login", ["messages" => ["wrong password"]]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/forum");
    }
}