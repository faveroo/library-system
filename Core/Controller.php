<?php

class Controller {

    protected function view($view, $data = []) {
        extract($data);
        require_once "app/Views/$view.php";
    }

    protected function model($model) {
        require_once "app/Models/$model.php";
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