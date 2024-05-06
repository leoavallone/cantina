<?php

use App\core\Controller;

class PedidoController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $estoqueData = $this->model("estoque");
        $this->dataReturned = $estoqueData->getDataEstoque();
        $this->view("pedido", $data = ["estoque" => $this->dataReturned]);
    }

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("estoque");
        $estoqueModel->createEstoque($_POST["nome"],$_POST["descricao"],$_POST["quantidade"]);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function editar(){
        header('Content-Type: application/json; charset=utf-8');
        if(isset($data) && !empty($data["id"])){
            $json["error"] = "Id do estoque não informado!";
            echo json_encode($json);
            return; 
        }
       
        $estoqueModel = $this->model("estoque");
        $estoqueModel->editarEstoque($_POST["id"],$_POST["nome"],$_POST["descricao"],$_POST["quantidade"]);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function deletar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("estoque");
        $estoqueModel->deletarEstoque($_POST["id"]);
        $json['status'] = 200;
        echo json_encode($json);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}