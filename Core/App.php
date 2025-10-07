<?php

class App {
    
    protected $controller = 'HomeController'; // Padrão
    protected $method = 'index'; // Padrão
    protected $params = [];
    
    public function __construct() {
        $url = $this->parseUrl();
        
        // Verifica se o controller existe (usa caminhos absolutos)
        $controllerPath = __DIR__ . "/../app/Controllers/" . ucfirst($url[0] ?? '') . "Controller.php";
        if (isset($url[0]) && file_exists($controllerPath)) {
            $this->controller = ucfirst($url[0]) . "Controller";
            unset($url[0]);
        }

        // Carrega o controller (usar caminho baseado em __DIR__ para evitar problemas com includes relativos)
        require_once __DIR__ . "/../app/Controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        
        // Verifica se o método existe
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        
        // Pega os parâmetros restantes
        $this->params = $url ? array_values($url) : [];
        
        // Chama o método com os parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    // Divide a URL em partes
    private function parseUrl() {
        // Garante que sempre retornamos um array
        if (!isset($_GET['url'])) {
            return [];
        }

        // Remove query string e espaços indesejados
        $raw = $_GET['url'];
        // Caso venha a partir do built-in router (REQUEST_URI), já estará sem query quando setado corretamente.
        $clean = trim($raw, " \/");
        if ($clean === '') {
            return [];
        }

        $parts = explode('/', filter_var($clean, FILTER_SANITIZE_URL));
        return $parts;
    }
}