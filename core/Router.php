<?php

/**
 * Classe Router
 * Responsável por interpretar URLs e direcionar para Controllers/Métodos corretos
 */
class Router {
    protected $controller = 'IndexController';
    protected $method = 'index';
    protected $params = [];
    

    public function __construct() {
        $url = $this->parseUrl();

        if(isset($url[0]) && !empty($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFile = '../app/controllers/' . $controllerName . '.php';
            

            if(file_exists($controllerFile)) {
                $this->controller = $controllerName;
                unset($url[0]);
            } else {
                $this->redirect('/');
            }
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        
        // Instancia o controller
        $this->controller = new $this->controller;
        
        if(isset($url[1]) && !empty($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                $this->redirect('/');
                return;
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array(
            [$this->controller, $this->method], 
            $this->params
        );
    }

    private function parseUrl() {
        if(isset($_GET['url'])) {
            // Remove a barra final se existir
            $url = rtrim($_GET['url'], '/');
            
            // Remove caracteres inválidos/perigosos
            $url = filter_var($url, FILTER_SANITIZE_URL);
            
            // Divide a URL em partes usando '/' como separador
            $url = explode('/', $url);
            
            return $url;
        }
        
        return null;
    }
}