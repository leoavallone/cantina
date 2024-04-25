<?php

namespace Leandrodonascimento\Cantina\Core;
use Exception;
abstract class Model {
    public function getPDO(){
        try{
            //return new \PDO("mysql:srv541.hstgr.io;dbname=u245207079_bd_cantina", "u245207079_usr_cantina", "X:rCD#w4");
            return new \PDO("mysql:host=127.0.0.1;dbname=bd_cantina", "root", "");
        } catch(Exception $e){
            die("Houve um erro ao se conectar com o banco: {$e->getMessage()}");
        }
        
    }
}