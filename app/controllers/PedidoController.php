<?php

use App\core\Controller;

class PedidoController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $estoqueData = $this->model("Pedido");
        $this->dataReturned = $estoqueData->getDataPedido();
        $this->view("pedido", $data = ["pedidos" => $this->dataReturned]);
    }

    public function finalizar(){
        header('Content-Type: application/json; charset=utf-8');
        if(isset($data) && !empty($data["id"])){
            $json["error"] = "Id do pedido não informado!";
            echo json_encode($json);
            return; 
        }
       
        $estoqueModel = $this->model("Pedido");
        $estoqueModel->finalizarPedido($_POST["id"]);
        $json = [];
        $json['item'] = "OK";
        echo json_encode($json);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}