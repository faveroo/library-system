<?php
    require_once '../core/Controller.php';

    class IndexController extends Controller {
        public function index() {
            $data = ["b", "c", "d"];
            $this->view('home', 'index', $data);
        }
    }