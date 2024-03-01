<?php

use Leandrodonascimento\Cantina\Core\Model;

class EstoqueModel extends Model {
    public function __construct(){}

    public function getDataEstoque(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM estoque";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createEstoque($nome,$descricao,$quantidade){
        $pdo = $this->getPDO();
        $query = "INSERT INTO estoque (nome, descricao, quantidade) values(?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$nome,$descricao,$quantidade]);
    }
}