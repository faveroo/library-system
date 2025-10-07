<?php

require_once __DIR__ . '/../../Core/Controller.php';

class HomeController extends Controller {
    public function index() {
        $this->view("index/index", ["title" => "Bem-vindo à Biblioteca"]);
    }
    
    public function register() {
        $this->view("auth/register", ["title" => "Registrar Conta"]);
    }
}