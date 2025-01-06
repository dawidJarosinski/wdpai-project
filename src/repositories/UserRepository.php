<?php

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function findUserByEmail(string $email) {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.users WHERE email = :email"
        );
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id']
        );
    }
    public function findUserById(int $id) {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.users WHERE id = :id"
        );
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id']
        );
    }

    public function saveUser($email, $password, $name, $surname){
        $stmt = $this->database->connect()->prepare(
            "INSERT INTO public.users (email, password, name, surname) VALUES (:email, :password, :name, :surname)"
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();
    }
}