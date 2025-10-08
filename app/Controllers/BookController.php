<?php

require_once __DIR__ . '/../../Core/Controller.php';

class BookController extends Controller {
    public function create() {
        if(!$this->isAuthenticated()) {
            $this->redirect('home/index', [
                'status' => 'Por favor, faça login para adicionar um livro',
                'type' => 'danger'
            ]);
            return;
        }

        if(!$this->isPost()) {
            $this->redirect('auth/error500', [
                'status' => 'Método inválido para esta ação',
                'type' => 'danger'
            ]);
            return;
        }


        $titulo = trim($_POST['titulo'] ?? '');
        $autor = trim($_POST['autor'] ?? '');
        $categoria_id = intval($_POST['category_id'] ?? 0);
        $descricao = intval($_POST['descricao'] ?? 0);

        if(empty($titulo) || empty($autor) || $categoria_id <= 0 || empty($descricao)) {
            $this->redirect('dashboard/books', ['status' => 'Dados inválidos', 'type' => 'danger', 'open' => 1]);
        }
                
        

    }
}