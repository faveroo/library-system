<?php

require_once 'Core/Controller.php';

class UserController extends Controller {

    public function create() {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('');
        }


        $userModel = $this->model('User');

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $status = $userModel->findByEmail($email);
        if($status['exist'] > 0) $this->redirect("?status=email%20ja%20cadastrado");

        $data = [
            "name" => htmlspecialchars($_POST['name']),
            "email" => $email,
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $user = $userModel->create($data);

        if($user) {
            $this->redirect('?status=Usuário%20Criado%20Com%20Sucesso');
        } else {
            $this->redirect('?status=Erro%20Ao%20Cadastrar%20Usuário');
        }
    }

    public function login() {
        
    }
}