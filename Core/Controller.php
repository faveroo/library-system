<?php

class Controller {

    protected function view($view, $data = [], $layout = 'main') {
        extract($data);
        $viewFile = __DIR__ . "/../app/Views/$view.php";
        $layoutFile =  __DIR__ . "/../app/Views/layouts/$layout.php";

        if(!file_exists($viewFile)) {
            die("View $viewFile not found");
        }

        ob_start();
        require_once $viewFile;
        $content = ob_get_clean();

        require_once $layoutFile;
    }

    protected function model($model) {
        require_once __DIR__ . "/../app/Models/$model.php";
        return new $model();
    }

    protected function redirect($url, $data = []) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!empty($data)) {
            $_SESSION['flash'] = $data;
        }
        header("Location: " . BASE_URL . $url);
        exit;
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function isAuthenticated() {
        
        return isset($_SESSION['user_id']);
    }
}