<?php

use App\core\Controller;

class RelatorioController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $estoqueData = $this->model("Relatorio");
        $this->dataReturned = $estoqueData->getDataRelatorio();
        $this->view("relatorio", $data = ["relatorios" => $this->dataReturned]);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}