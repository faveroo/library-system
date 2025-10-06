<?php

require_once 'Core/Controller.php';

class UserController extends Controller {

    public function create() {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('?status=Acesso%20Inválido');
        }

        $userModel = $this->model('User');
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $status = $userModel->findByEmail($email);
        
        if($status['exist'] > 0) { 
            $this->view("auth/register", ["status" => "Email já cadastrado", "old" => $_POST]); 
            return;
        }

        $data = [
            "name" => htmlspecialchars($_POST['name']),
            "email" => $email,
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $user = $userModel->create($data);

        if($user) {
            $this->redirect('?status=Usuário%20Criado%20Com%20Sucesso');
        } else {
            $this->view('auth/register', ["status" => "Erro ao Cadastrar Usuário", "old" => $_POST]);
            return;
        }
    }

    public function authenticate() {
        if(!$this->isPost()) {return;}

        $userModel = $this->model('User');
        $userModel->__set("email", filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $user = $userModel->findByEmail($userModel->__get("email"));

        if($user && password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            $this->redirect('/dashboard/home');
        } else {
            $this->view('/index/index', ["status" => "Credenciais Inválidas"]);
            return;
        }

    }
}