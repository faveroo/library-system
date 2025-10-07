<?php

require_once __DIR__ . '/../../Core/Controller.php';

class DashboardController extends Controller {
    public function home() {
        if (!$this->isAuthenticated()) {
            $this->redirect('home/index', [
                'status' => 'Por favor, faça login para acessar o dashboard',
                'type' => 'danger'
            ]);
            return;
        }

        $this->view('dashboard/home');
    }

    public function profile() {
        if (!$this->isAuthenticated()) {
            $this->redirect('home/index', [
                'status' => 'Por favor, faça login para acessar o perfil',
                'type' => 'danger'
            ]);
            return;
        }

        $userModel = $this->model('User');
        $userModel->__set("id", $_SESSION['user_id']);
        $user = $userModel->getUserById($userModel->__get("id"));
        // ...
    }
}