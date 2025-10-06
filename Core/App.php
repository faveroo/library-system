<?php

class App {
    
    protected $controller = 'HomeController'; // Padrão
    protected $method = 'index'; // Padrão
    protected $params = [];
    
    public function __construct() {
        $url = $this->parseUrl();
        
        // Verifica se o controller existe
        if(isset($url[0]) && file_exists("app/controllers/" . ucfirst($url[0]) . "Controller.php")) {
            $this->controller = ucfirst($url[0]) . "Controller";
            unset($url[0]);
        }
        
        // Carrega o controller
        require_once "app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        
        // Verifica se o método existe
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
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
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}