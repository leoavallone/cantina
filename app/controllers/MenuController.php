<?php

use App\core\Controller;

class MenuController extends Controller{
    public function __construct(){
        //$this->isAuth();
    }

    public function index(){
        //$estoqueData = $this->model("cardapio");
        //$this->dataReturned = $estoqueData->getDataEstoque();
        //print_r($this->dataReturned);
        $this->view("menu", $data = ["cardapio" => []]);
    }

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Cardapio");
        $estoqueModel->createEstoque($_POST["descricao"],$_POST["data"],$_POST["status"]);
        $json = [];
        $json['item'] = $_POST["descricao"];
        echo json_encode($json);
    }

    public function searchByCat(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Menu");
        $this->dataReturned = $estoqueModel->searchItemMenuByCat($_POST["categoria"]);
        echo json_encode($this->dataReturned);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}