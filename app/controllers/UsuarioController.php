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

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("usuario");
        $estoqueModel->createUser($_POST["login"],$_POST["email"],$_POST["password"],$_POST["nivel"]);
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