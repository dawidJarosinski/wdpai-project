<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function login() {
        $this->render('login');
    }

    public function forum() {
        $this->render('forum');
    }

    public function register() {
        $this->render('register');
    }

    public function addPostForm() {
        $this->render('addPostForm');
    }
}