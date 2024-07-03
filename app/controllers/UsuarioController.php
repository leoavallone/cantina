<?php

use App\core\Controller;

class UsuarioController extends Controller{
    public function __construct(){
        $this->isAuth();
    }

    public function index(){
        $userData = $this->model("Usuario");
        $this->dataReturned = $userData->getDataUser();
        $this->view("usuarios", $data = ["user" => $this->dataReturned]);
    }

    public function criar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Usuario");
        $estoqueModel->createUser($_POST["login"],$_POST["email"],password_hash($_POST["password"], PASSWORD_DEFAULT),$_POST["nivel"],$_POST["nivel"]);
        $json = [];
        $json['item'] = $_POST["login"];
        echo json_encode($json);
    }

    public function editar(){
        header('Content-Type: application/json; charset=utf-8');
        if(isset($data) && !empty($data["id"])){
            $json["error"] = "Id do usuario não informado!";
            echo json_encode($json);
            return; 
        }
       
        $estoqueModel = $this->model("Usuario");
        if($_POST["password"] === ""){
            $estoqueModel->editarUser($_POST["id"],$_POST["login"],$_POST["email"],"",$_POST["status"],$_POST["nivel"]);
        }else{
            $estoqueModel->editarUser($_POST["id"],$_POST["login"],$_POST["email"],password_hash($_POST["password"], PASSWORD_DEFAULT),$_POST["status"],$_POST["nivel"]);
        }
        
        $json = [];
        $json['item'] = $_POST["login"];
        echo json_encode($json);
    }

    public function deletar(){
        header('Content-Type: application/json; charset=utf-8');
        $estoqueModel = $this->model("Usuario");
        $estoqueModel->deletarEstoque($_POST["id"]);
        $json['status'] = 200;
        echo json_encode($json);
    }

    public function logout(){
        $_SESSION = [];
        header("Location: /login");
    }
}