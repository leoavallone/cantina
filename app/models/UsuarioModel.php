<?php

use Leandrodonascimento\Cantina\Core\Model;

class UsuarioModel extends Model {
    public function __construct(){}

    public function getDataUser(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM users";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createUser($login,$email,$password,$status){
        $pdo = $this->getPDO();
        $query = "INSERT INTO users (login, email, password, status) values(?,?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$login,$email,$password,$status]);
    }
}