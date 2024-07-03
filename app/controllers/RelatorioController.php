<?php

use App\core\Controller;

class RelatorioController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $cardapioData = $this->model("Cardapio");
        $this->dataReturned = $cardapioData->getDataCardapio();
        $this->view("relatorio", $data = ["relatorios" => $this->dataReturned]);
    }
    public function getRelatorio(){
        if(!empty($data["cardapioId"])){
            $json["error"] = "Id do cardapio não informado!";
            echo json_encode($json);
            return; 
        }
        $estoqueData = $this->model("Relatorio");
        $this->dataReturned = $estoqueData->getDataRelatorio($_POST["cardapioId"]);
        echo json_encode($this->dataReturned);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}