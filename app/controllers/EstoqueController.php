<?php

use Leandrodonascimento\Cantina\Core\Controller;

class EstoqueController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $this->view("estoque");
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}