<?php

use Leandrodonascimento\Cantina\Core\Controller;

class CardapioItensController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $estoqueData = $this->model("estoque");
        $this->dataReturned = $estoqueData->getDataEstoque();
        print_r($this->dataReturned);
        $this->view("cardapioitens", $data = ["estoque" => $this->dataReturned]);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}