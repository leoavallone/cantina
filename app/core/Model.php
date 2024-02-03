<?php

namespace Leandrodonascimento\Cantina\Core;
use Exception;
abstract class Model {
    public function getPDO(){
        try{
            return new \PDO("mysql:host=localhost", "root", "");
        } catch(Exception $e){
            die("Houve um erro ao se conectar com o banco: {$e->getMessage()}");
        }
        
    }
}