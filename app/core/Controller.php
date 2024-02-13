<?php

namespace Leandrodonascimento\Cantina\Core;

abstract class Controller {
    public function model($model){
        $model .= "Model";
        require_once "app/models/{$model}.php";
        return new $model;
    }

    public function view($view){
        require_once "app/views/template.php";
    }

    public function isAuth(){
        if(!isset($_SESSION["authenticated"])){
            header("Location: /login");
        }
    }
}