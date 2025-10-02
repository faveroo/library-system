<?php
    class Controller {
    
    // Carrega uma view
    protected function view($type, $view, $data = []) {
        extract($data); // Transforma array em variáveis
        require_once "../app/views/$type/$view.php";
    }
    
    // Carrega um model
    protected function model($model) {
        require_once "../app/models/$model.php";
        return new $model();
    }
    
    // Redireciona para outra página
    protected function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit;
    }
}