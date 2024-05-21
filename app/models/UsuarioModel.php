<?php

use App\core\Model;

class UsuarioModel extends Model {
    public function __construct(){}

    public function getDataUser(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM users";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createUser($login,$email,$password,$status,$role){
        $pdo = $this->getPDO();
        $query = "INSERT INTO users (login, email, password, status, role) values(?,?,?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$login,$email,$password,$status,$role]);
    }

    public function editarUser($id,$login,$email,$password,$status,$role){
        $pdo = $this->getPDO();
        if($password === ""){
            $query = "UPDATE users SET login=?, email=?, status=?, role=? WHERE id=?";
            $result = $pdo->prepare($query);
            $execute = $result->execute([$login,$email,$status,$role,$id]);
        }else{
            $query = "UPDATE users SET login=?, email=?, password=?, status=?, role=? WHERE id=?";
            $result = $pdo->prepare($query);
            $execute = $result->execute([$login,$email,$password,$status,$role,$id]);
        }
        return $execute;
    }
}