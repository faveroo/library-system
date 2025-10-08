<?php

require_once __DIR__ . '/../../Core/Controller.php';

class AuthController extends Controller {

    public function register() {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view("auth/register", ["title" => "Registrar Conta"]);
            exit;
        }

        $userModel = $this->model('User');
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $status = $userModel->findByEmail($email);
        if($status['exist'] > 0) { 
            $this->view("auth/register", ["status" => "Email já cadastrado", "type" => "danger", "old" => $_POST, "title" => "Registrar Conta", "autofocus" => "email"]); 
            return;
        }

        $data = [
            "name" => htmlspecialchars($_POST['name']),
            "email" => $email,
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $user = $userModel->create($data);

        if($user) {
            $this->redirect('', ['status' => 'Usuário Criado Com Sucesso', 'type' => 'success']);
        } else {
            $this->view('auth/register', ["status" => "Erro ao Cadastrar Usuário", "type" => "danger", "old" => $_POST, "title" => "Registrar Conta"]);
            return;
        }
    }

    public function authenticate() {
        if(!$this->isPost()) {
            if($this->isAuthenticated()) {
                $this->redirect('dashboard/home');
                return;
            }
            $this->redirect('home/index', ['title' => 'Entrar na Conta', 'status' => 'Por favor, faça login para continuar', 'type' => 'info']);
            return;
        }

        $userModel = $this->model('User');
        $userModel->__set("email", filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $user = $userModel->findByEmail($userModel->__get("email"));

        if($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            // Redireciona para o dashboard (altera a URL no navegador)
            $this->redirect('dashboard/home', ['status' => 'Login realizado com sucesso', 'type' => 'success']);
            return;
        } else {
            // Exibe a view de login com mensagem de erro
            $this->redirect('', ["status" => "Credenciais Inválidas", "type" => "danger"]);
            return;
        }
    }

    public function error500() {
        $this->view('auth/error500');
    }
}