<?php

class Controller {

    protected function view($view, $data = []) {
        extract($data);
        require_once __DIR__ . "/../app/Views/$view.php";
    }

    protected function model($model) {
        require_once __DIR__ . "/../app/Models/$model.php";
        return new $model();
    }

    protected function redirect($url) {
        header("Location:  " . BASE_URL . $url);
        exit;
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}