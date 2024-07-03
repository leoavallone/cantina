<?php

use App\core\Controller;

class CardapioController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $cardapioData = $this->model("Cardapio");
        $this->dataReturned = $cardapioData->getDataCardapio();
        $this->view("cardapios", $data = ["cardapio" => $this->dataReturned]);
    }

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Cardapio");
        $estoqueModel->createCardapio($_POST["descricao"],$_POST["data"],$_POST["status"]);
        $json = [];
        $json['item'] = $_POST["descricao"];
        echo json_encode($json);
    }

    public function editar(){
        header('Content-Type: application/json; charset=utf-8');
        if(isset($data) && !empty($data["id"])){
            $json["error"] = "Id do cardapio não informado!";
            echo json_encode($json);
            return; 
        }
       
        $cardapioModel = $this->model("Cardapio");
        $cardapioModel->editarCardapio($_POST["id"],$_POST["descricao"],$_POST["status"]);
        $json = [];
        $json['item'] = $_POST["descricao"];
        echo json_encode($json);
    }

    public function deletar(){
        header('Content-Type: application/json; charset=utf-8');
        $cardapioModel = $this->model("Cardapio");
        $cardapioModel->deletarCardapio($_POST["id"]);
        $json['status'] = 200;
        echo json_encode($json);
    }

    public function criarItem(){
        header('Content-Type: application/json; charset=utf-8');
        $cardapioModel = $this->model("Cardapio");
        $cardapioModel->createItemCardapio($_POST["cardapioId"],$_POST["nome"],$_POST["categoria"],$_POST["quantidade"],$_POST["preco"],$_POST["descricao"]);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function verItem(){
        $cardapioData = $this->model("Cardapio");
        $this->dataReturned = $cardapioData->getDataItemCardapio($_POST["cardapioId"]);
        echo json_encode($this->dataReturned);
    }

    public function atualizarItem(){
        header('Content-Type: application/json; charset=utf-8');
        if(isset($data) && !empty($data["id"])){
            $json["error"] = "Id do item não informado!";
            echo json_encode($json);
            return; 
        }
       
        $cardapioModel = $this->model("Cardapio");
        $cardapioModel->updateItemCardapio($_POST["id"],$_POST["nome"],$_POST["descricao"],$_POST["preco"],$_POST["quantidade"]);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function deletarItem(){
        header('Content-Type: application/json; charset=utf-8');
        $cardapioModel = $this->model("Cardapio");
        $cardapioModel->deletarItemCardapio($_POST["id"]);
        $json['status'] = 200;
        echo json_encode($json);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}