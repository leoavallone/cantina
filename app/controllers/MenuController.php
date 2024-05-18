<?php

use App\core\Controller;

class MenuController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $menuData = $this->model("Menu");
        $this->dataReturned = $menuData->getDataMenu();
        $this->view("menu", $data = ["menu" => $this->dataReturned]);
    }

    public function finalizarPedido(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Menu");
        $estoqueModel->createPedido($_POST["cardapioId"],$_POST["itens"],$_POST["total"],$_POST["pagamento"],$_POST["nome"],$_POST["modalidade"],1);
        $json = [];
        $json['item'] = $_POST["nome"];
        echo json_encode($json);
    }

    public function atualizaQtdCardapio(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Menu");
        $carrinho = json_decode($_POST["carrinho"],true);
        if(is_array($carrinho)){
            foreach($carrinho as $car){
                $itemCardapio = $estoqueModel->getItemByName($car["nome"]);
                if($itemCardapio){
                    $novaQuantidade = $itemCardapio[0]["quantidade"] - $car["quantidade"];
                    $estoqueModel->atualizaQtd($_POST["cardapioId"],$car["nome"], $novaQuantidade);
                }
            }
            $json = [];
            $json['item'] = "Ok";
            echo json_encode($json);
        }else{
            $json["error"] = "Carrinho não encontrado!";
            echo json_encode($json);
            return; 
        }
        
    }

    public function searchByCat(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Menu");
        $this->dataReturned = $estoqueModel->searchItemMenuByCat($_POST["cardapioId"], $_POST["categoria"]);
        echo json_encode($this->dataReturned);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}