<?php

use Leandrodonascimento\Cantina\Core\Controller;

class UsuarioController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $userData = $this->model("usuario");
        $this->dataReturned = $userData->getDataUser();
        $this->view("usuarios", $data = ["user" => $this->dataReturned]);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}