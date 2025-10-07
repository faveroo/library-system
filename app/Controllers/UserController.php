<?php

require_once __DIR__ . '/../../Core/Controller.php';

class UserController extends Controller {
    public function sair() {
        if(session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
            $this->redirect('', ['status' => 'Desconectado com sucesso', 'type' => 'success']);
        }

        $this->redirect('', ['status' => 'Nenhuma sessão ativa', 'type' => 'info']);
    }
}
