<?php

use Leandrodonascimento\Cantina\Core\Controller;

class LoginController extends Controller{
    public function __construct(){}

    public function index(){
        $this->view("login");
    }

    public function auth(){
        header('Content-Type: application/json; charset=utf-8');
        $date = "Olá";
        echo json_encode($date);
    }
}