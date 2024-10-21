<?php

use App\core\Controller;

class LoginController extends Controller{
    public function __construct(){}

    public function index(){
        $this->view("login");
    }

    public function auth(){
        header('Content-Type: application/json; charset=utf-8');
        $authLogin = $this->model("Login");
        $data = $authLogin->getDataUser($_POST["email"]);
        $json = [];
        if(isset($data) && !empty($data["password"])){
            $isAuthenticated = $this->checkLogin($data,$_POST["password"],$data["password"]);
            if($isAuthenticated){
                $json["username"] = $data["login"];
                echo json_encode($json);
                return;
            }
        }
        $json["error"] = "Usuário não encontrado!";
        echo json_encode($json);
    }

    public function checkLogin($data,$informedPassword,$userPass){
        if(!empty($data)){
            if(password_verify($informedPassword,$userPass)){
                $_SESSION = $data;
                $_SESSION["authenticated"] = true;
                return true;
            }
        }
        return false;
    }

    public function dashboard(){
        $this->view("dashboard");
    }
}