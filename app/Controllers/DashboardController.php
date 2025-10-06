<?php

require_once 'core/Controller.php';

class DashboardController extends Controller {
    public function home() {
        $this->view('dashboard/home');
    }
}