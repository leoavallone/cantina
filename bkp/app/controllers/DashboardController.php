<?php

use App\core\Controller;

class DashboardController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $this->view("dashboard");
    }

    public function estoque(){
        $this->view("estoque");
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}