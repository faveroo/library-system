<?php

require_once 'core/Controller.php';

class HomeController extends Controller {
    public function index() {
        $this->view("index/index");
    }
    
    public function register() {
        $this->view("auth/register");
    }
}