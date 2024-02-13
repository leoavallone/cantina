<?php

namespace Leandrodonascimento\Cantina\Core;
use Exception;
abstract class Model {
    public function getPDO(){
        try{
            return new \PDO("mysql:host=127.0.0.1;dbname=bd_cantina", "root", "");
        } catch(Exception $e){
            die("Houve um erro ao se conectar com o banco: {$e->getMessage()}");
        }
        
    }
}