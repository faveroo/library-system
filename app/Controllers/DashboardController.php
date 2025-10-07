<?php

require_once __DIR__ . '/../../Core/Controller.php';

class DashboardController extends Controller {
    public function home() {
        $this->view('dashboard/home');
    }
}