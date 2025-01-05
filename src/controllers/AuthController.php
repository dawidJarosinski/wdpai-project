<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repositories/UserRepository.php";

class AuthController extends AppController {

    public function login() {
        $userRepository = new UserRepository();
        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->findUserByEmail($email);

        if(!$user) {
            return $this->render("login", ["User not exisit!"]);
        }

        if($user->getEmail() !== $email) {
            return $this->render("login", ["messages" => ["user with this email not exists"]]);
        }

        if($user->getPassword() !== $password) {
            return $this->render("login", ["messages" => ["wrong password"]]);
        }

        $_SESSION['user'] = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'id' => $user->getId()
        ];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/forum");
    }

    public function register() {
        $userRepository = new UserRepository();
        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        $user = $userRepository->findUserByEmail($email);

        if($user) {
            return $this->render("register", ["messages" => ["User with this email already exists!"]]);
        }

        $userRepository->saveUser($email, $password, $name, $surname);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function logout() {
        session_unset();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/forum");
    }
}