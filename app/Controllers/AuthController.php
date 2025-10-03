<?php
    require_once '../core/Controller.php';

    class AuthController extends Controller {
        public function register() {
           if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/');
            return;
            }
            
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $userModel = $this->model('User');

            $this->redirect('/');
           
        }
    }